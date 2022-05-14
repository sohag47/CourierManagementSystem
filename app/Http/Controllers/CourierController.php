<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Branch;
use App\Models\Price;
use App\Models\CustomerOrder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $customerId;
    protected $viewPath = 'dashboard.courier.';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customer_order_infos = CustomerOrder::with('customers', 'senderBranches', 'recipientBranch', 'sender_deliveryman', 'recipient_deliveryman')->where('order_received', '=', null)->get()->toArray();
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
        CustomerOrder::findOrFail($id)->destroy($id);
        return redirect()->route('courier.index')->with('status', 'Deleted Successfully.');
    }
    public function orderReceived($id)
    {
        $order = [
            'order_received' => Carbon::now()->format('Y-m-d H:i:s')
        ];
        CustomerOrder::where('id', '=', $id)->update($order);
        return redirect()->route('courier.index')->with('status', 'Order Received Successfully');
    }
    public function ReceivedOrderList()
    {
        $customer_order_infos = CustomerOrder::with('customers', 'senderBranches', 'recipientBranch', 'sender_deliveryman', 'recipient_deliveryman')->where('order_received', '!=', null)->get()->toArray();
        return view($this->viewPath.'order_received', compact('customer_order_infos'));
    }
    public function OrderTransfer($id)
    {
        $delivery_man = "Delivery Man";
        $delivery_mans = DB::select("select usr.* , r.title, b.id as branchId, b.name as branch_name
            from users as usr 
            join role as r on r.id = usr.user_role
            join branch as b on b.id = usr.branch_id
            where r.title like '%$delivery_man%' and usr.deleted_at is null"
        );
        $customer_order_infos = CustomerOrder::with('customers', 'senderBranches', 'recipientBranch', 'sender_deliveryman', 'recipient_deliveryman')->where('id', '=', $id)->get()->toArray();
        return view($this->viewPath.'order_transfer', compact('customer_order_infos', 'delivery_mans'));
    }
    public function OrderTransferSave(Request $request, $id)
    {
        $order = [
            'sender_deliveryman_id' => $request->sender_deliveryman_id
        ];
        CustomerOrder::where('id', '=', $id)->update($order);
        return redirect()->back()->with('status', 'Order Transfer Successfully');
    }
    public function OrderTransferList()
    {
        $customer_order_infos = CustomerOrder::with('customers', 'senderBranches', 'recipientBranch', 'sender_deliveryman', 'recipient_deliveryman')
        ->where('sender_deliveryman_id', '!=', null)
        // ->where('sender_deliveryman_id', '=', Auth::user()->id)
        ->where('arrived_destination', '=', null)->get()->toArray();
        // dd($customer_order_infos);
        return view($this->viewPath.'order_transfer_list', compact('customer_order_infos'));
    }
    public function orderArrivedDestination($id)
    {
        $order = [
            'arrived_destination' => Carbon::now()->format('Y-m-d H:i:s')
        ];
        CustomerOrder::where('id', '=', $id)->update($order);
        return redirect()->back()->with('status', 'Order Delivered Successfully');
    }
    public function OrderdeliveryList()
    {
        $customer_order_infos = CustomerOrder::with('customers', 'senderBranches', 'recipientBranch', 'sender_deliveryman', 'recipient_deliveryman')
        ->where('recipient_deliveryman_id', '=', null)
        // ->where('recipient_branch_id', '=', Auth::user()->branch_id)
        ->where('arrived_destination', '!=', null)
        ->get()->toArray();
        return view($this->viewPath.'order_delivery_list', compact('customer_order_infos'));
    }
    public function Orderdelivered($id)
    {
        $delivery_man = "Delivery Man";
        $delivery_mans = DB::select("select usr.* , r.title, b.id as branchId, b.name as branch_name
            from users as usr 
            join role as r on r.id = usr.user_role
            join branch as b on b.id = usr.branch_id
            where r.title like '%$delivery_man%' and usr.deleted_at is null"
        );
        $customer_order_infos = CustomerOrder::with('customers', 'senderBranches', 'recipientBranch', 'sender_deliveryman', 'recipient_deliveryman')->where('id', '=', $id)->get()->toArray();
        return view($this->viewPath.'order_delivered', compact('customer_order_infos', 'delivery_mans'));
    }
    public function OrderDeliveredSave(Request $request, $id)
    {
        $order = [
            'recipient_deliveryman_id' => $request->recipient_deliveryman_id
        ];
        CustomerOrder::where('id', '=', $id)->update($order);
        return redirect()->back()->with('status', 'Order Transfer Successfully');
    }
    public function OrderComplete()
    {
        $customer_order_infos = CustomerOrder::with('customers', 'senderBranches', 'recipientBranch', 'sender_deliveryman', 'recipient_deliveryman')->where('recipient_deliveryman_id', '!=', null)
        // ->where('recipient_deliveryman_id', '=', Auth::user()->id)
        ->where('delivered', '=', null)->get()->toArray();
        return view($this->viewPath.'order_complete_list', compact('customer_order_infos'));
    }
    public function OrderCompleteSave(Request $request, $id)
    {
        $order = [
            'status' => 1,
            'delivered' =>  Carbon::now()->format('Y-m-d H:i:s')
        ];
        CustomerOrder::where('id', '=', $id)->update($order);
        return redirect()->back()->with('status', 'Order Transfer Successfully');
    }
    public function OrderHistory()
    {
        $customer_order_infos = CustomerOrder::with('customers', 'senderBranches', 'recipientBranch', 'sender_deliveryman', 'recipient_deliveryman')->get()->toArray();
        return view($this->viewPath.'order_complete_history', compact('customer_order_infos'));
    }
}
