<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Branch;
use App\Models\Price;
use App\Models\CustomerOrder;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;


class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $customerId;
    protected $viewPath = 'dashboard.courier.';

    public function index()
    {
        $customer_order_infos = CustomerOrder::with('customers', 'senderBranches', 'recipientBranch', 'sender_deliveryman', 'recipient_deliveryman')->get()->toArray();
        // dd($customer_order_infos);
        return view($this->viewPath.'index', compact('customer_order_infos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::get()->toArray();
        $price = Price::all();
        return view($this->viewPath.'add', compact('branches', 'price'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'sender_name' => 'required',
        //     'sender_phone' => 'required',
        //     'recipient_name' => 'required',
        //     'recipient_phone' => 'required',
        //     'sender_address' => 'required',
        //     'recipient_address' => 'required',
        //     'description' => 'required',
        //     'weight' => 'required',
        //     'branch_id' => 'required',
        //     'sender_address' => 'required',
        //     'sender_branch_id' => 'required',
        //     'recipient_branch_id' => 'required',
        // ]);

        DB::transaction(function () use ($request) {
            $this->insertCustomer($request);
            $this->insertCustomerOrder($request);
        });
        return redirect()->route('courier.index')->with('status', 'Saved Successfully');
    }
    public function insertCustomer($request){
        $customer_info = [
            'sender_name' => $request->sender_name,
            'sender_phone' => $request->sender_phone,
            'sender_address' => $request->sender_address,
            'recipient_name' => $request->recipient_name,
            'recipient_phone' => $request->recipient_phone,
            'recipient_address' => $request->recipient_address,
            'description' => $request->description,
            'weight' => $request->weight,
            
        ];
        $prices = Price::all();
        foreach ($prices as $price) {
            if ($price['type'] == "Product Cost") {
                $ProductCost = $price['price'];
            }
            elseif($price['type'] == "Delivery Cost"){
                $DeliveryCost = $price['price'];
            }
        }
        $customer_info['product_cost'] = $ProductCost;
        $customer_info['delivery_cost'] = $DeliveryCost;

        $sub_total = $ProductCost * $customer_info['weight'];
        $total_price = $sub_total + $DeliveryCost;
        $customer_info['price'] = $total_price;
        $customer_id = Customer::create($customer_info);
        $this->customerId = $customer_id['id'];
        return;
    }
    public function insertCustomerOrder($request){
        $order_number = Helper::IDGenerator(new CustomerOrder, 'order_id', 5, 'ORDER');
        $customer_order_info = [
            'customer_id' => $this->customerId,
            'sender_branch_id' => $request->sender_branch_id,
            'recipient_branch_id' => $request->recipient_branch_id,
            'order_id' => $order_number
        ];
        CustomerOrder::create($customer_order_info);
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $branch = Branch::find($id)->toArray();
        // return view($this->viewPath.'edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|unique:branch,name',
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'status' => 'required',
        // ]);
        // Branch::where('id', '=', $id)->update($validatedData);
        // return redirect()->route('branch.index')->with('status', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Branch::findOrFail($id)->destroy($id);
        // return redirect()->route('branch.index')->with('status', 'Deleted Successfully.');
    }
}
