<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\OrderDetail;
use View;
use DB;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
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
        $data = DB::table('products')
        ->where("products.store",$id)
        ->leftJoin('order_details','order_details.product_id','=','products.id')
        
        ->select('products.id','products.name','products.cash_price','products.credit_price','products.vat','products.desc','products.bar','products.company','products.quantity','products.created_at','products.updated_at',
        DB::raw('Sum(order_details.quantity) AS sold')) 
        ->groupBy('products.id')
        ->get();     
        
        
        return view('product.index')->with('orders',$data)->with('orderby', $data)->with('store',$id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('product.addproduct')->with('store',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {   
        $product = new Product;
		$product->name = Input::get('name');
		$product->company = Input::get('company');
		$product->cash_price = Input::get('cash_price');
		$product->credit_price = Input::get('credit_price');
		$product->color = Input::get('color');
        $product->bar = Input::get('bar');
        $product->vat = Input::get('vat');
        $product->desc = Input::get('desc');
		$product->store = $id;
		$product->quantity = Input::get('quantity');
		$product->save();		
		return Redirect::to('/store/'.$id.'/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::all();
        $allOrders = OrderDetail::all();
        $data = DB::table('products')
        ->leftJoin('order_details','order_details.product_id','=','products.id')
        ->select('products.id','products.name','products.cash_price','products.credit_price','products.company','products.quantity','products.created_at','products.updated_at',
        DB::raw('Sum(order_details.quantity) AS sold'))
        ->groupBy('products.id')
        ->get();     
        
        
        return view('product.index')->with('products', $products)->with('orders',$data)->with('orderby', $data)->with('store',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($store,$id)
    {
		$product = Product::find($id);
        return view('product.update')->with('productToUpdate', $product)->with('store',$store);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $store ,$id)
    {
        
        $product = Product::find($id);
		$product->name = Input::get('name');
		$product->company = Input::get('company');
		$product->cash_price = Input::get('cash_price');
		$product->credit_price = Input::get('credit_price');
		$product->quantity = Input::get('quantity');
        $product->bar = Input::get('bar');
        $product->vat = Input::get('vat');
        $product->desc = Input::get('desc');
		$product->save();	
        return Redirect::to('/store/'.$store.'/product');	
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $store
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($store)
    {

        $product = Product::find(Input::get('id'));
		if($product){
			$product->delete();
            return Redirect::to('/store/'.$store.'/product');
		}
    }
}
