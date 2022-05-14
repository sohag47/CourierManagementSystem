<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Address;
use App\Models\CustomerOrder;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $addresses = Address::get();
        $branches = Branch::with('addresses')->get();
        return view('home', compact('branches', 'addresses'));
    }
    public function searchOrder(Request $request)
    {
        $customer_order_infos = CustomerOrder::with('customers', 'senderBranches', 'recipientBranch', 'sender_deliveryman', 'recipient_deliveryman')->where('order_id', '=', $request->order_id)->get()->toArray();
        // dd($customer_order_infos);
        return view('search_order', compact('customer_order_infos'));
    }
}
