<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Product;

use App\Order;
use App\OrderDetail;
class OrderController extends Controller
{
	public function __construct()
    {
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
	
	$products = Product::where('store',$id)->get();
	
	$getid = '';
	return view('orders.index')->with('products', $products)->with('orders', $getid)->with('orderby', $getid)->with('store',$id);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$storeId)
    {
		
        $order = new Order;
		$input = Input::all();
		$order->name = Input::get('name');		
		$order->location = Input::get('location');
		$order->number = Input::get('number');
		$order->store = $storeId;
		$order->save();
		$j = $order->id;
		$sum=0;
		$vat=0;
		if($j > 0){
			for($id = 0; $id < count($input['product_id']); $id++){
				$orderdetails = new OrderDetail;
				$orderdetails->order_id = $j;
				$orderdetails->product_id = $input['product_id'][$id];
				$orderdetails->quantity = $input['qty'][$id];
				$orderdetails->unitprice = $input['price'][$id];
				$orderdetails->payment_t = $input['payment_t'][$id];
				$orderdetails->discount = $input['dis'][$id];
				$orderdetails->amount = $input['amount'][$id];
				$orderdetails->store = $storeId;
				$orderdetails->bar = $input['bar'][$id];
				$orderdetails->vat = $input['vat'][$id];
				$orderdetails->vatTotal = $input['vatTotal'][$id];
				$orderdetails->save();
				$sum += $orderdetails->amount;
				$vat += $orderdetails->vatTotal;
			}
			
		}
		$products = Product::all();
		$product = Product::find($orderdetails->product_id);
		$product->quantity = $product->quantity - $orderdetails->quantity ;
		$product->save();	

		$orderdetails = OrderDetail::where('order_id', $order->id)->get();
		$orderby = Order::where('id', $order->id)->get();
		
		return view('orders.index')->with('orders', $orderdetails)->with("sum",$sum)->with('products', $products)->with('orderby', $orderby)->with('store',$storeId)->with('vat',$vat);
		
    }

}
