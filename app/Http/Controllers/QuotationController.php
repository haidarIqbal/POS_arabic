<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Order;
use App\Product;
use App\Quotation;
use App\OrderDetail;

class QuotationController extends Controller
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
	$products = Product::all();
	$getid = '';
	
	
        return view('quotation.index')->with('products', $products)->with('orders', $getid)->with('orderby', $getid)->with('store',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$storeId)
    {
		$input = Input::all();
		$j = round(microtime(true) * 10000);;
		$sum=0;
        $order = new Order;
        $order->name = Input::get('name');		
        $order->location = Input::get('location');
        $order->number = Input::get('number');
        $vat=0;
			for($id = 0; $id < count($input['product_id']); $id++){
                $orderdetails = new Quotation;
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
           
		    $products = Product::all();
            $orderdetails = Quotation::where('order_id', $orderdetails->order_id )->get();
            
            return view('quotation.index')->with('orders', $orderdetails)->with("sum",$sum)->with('products', $products)->with('user',$order)->with('store',$storeId)->with('vat',$vat);
		
    }

}

