<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('login', function(){
    return view('login');
});

Route::post('login', 'LoginController@login');

Route::post('logout', 'LoginController@logout');

Route::get('products', function(){
    return view('product')->with('products', DB::table('products')->get());
});

Route::get('products/{id}', function($id){
    return view('buy')->with('product', DB::table('products')->where('product_id', $id)->first());
});

Route::get('carts', 'CartController@showCart');
Route::post('carts', 'CartController@addItem');
Route::patch('carts', 'CartController@updateItems');

Route::post('carts/checkout', 'CartController@checkout');

Route::group(['middleware' => ['auth']], function(){
    Route::get('users', 'UserController@showUserPage');
    Route::get('users/addresses', 'UserController@showAddressBook');
    Route::put('users/addresses', 'UserController@updateAddress');
    Route::post('users/addresses', 'UserController@addAddress');
});
