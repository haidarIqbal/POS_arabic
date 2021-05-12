<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($store)
    {
        $customers= Order::where('store',$store)->get();
        $orders = OrderDetail::where('store',$store)->orderBy('created_at', 'desc')->get();
        return view('customer.index')->with('customers',$customers)->with('orders',$orders)->with('store',$store);
    }

    
}
