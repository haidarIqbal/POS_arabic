<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'web'], function () {
	Route::get('/','StoreController@index' )->middleware('auth');
	Route::auth();

	Route::get('/register', function(){
		return view('auth.register');
	})->middleware('isAdmin');
	
	Route::resource('/users', 'UsersController');
	Route::resource('/store/{id}/product', 'ProductController');
	Route::resource('/store/{id}/orders', 'OrderController');
	Route::resource('/store/{id}/sales', 'SaleController');
	Route::resource('/store', 'StoreController');
	Route::resource('/store/{id}/quotation', 'QuotationController');
	Route::resource('/store/{id}/customers', 'CustomerController');
	Route::get('/shop', function(){
		return view('shop.index');
	});

});
