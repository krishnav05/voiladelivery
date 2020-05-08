<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/outlet/{slug}/menu','MenuController@getItems');

// Route::post('/outlet/{slug}/add_item','MenuController@addItem')->name('add.item');

// Route::get('/outlet/{slug}/offers',function(){
// 	return view('offers');
// });


// Route::get('/outlet/{slug}/home', 'HomeController@index')->name('home')->middleware('verified');

// Route::get('/outlet/{slug}/kitchen','KitchenController@getItems');

// Route::post('/outlet/{slug}/kitchen_update','KitchenController@updateItems');

// Route::get('/outlet/{slug}/address','AddressController@getDetails')->middleware('auth');

// // route for make payment request using post method
// Route::post('/dopayment', 'RazorpayController@dopayment')->name('dopayment')->middleware('auth');

// //add address
// Route::post('/add_address','AddressController@add')->name('add.address')->middleware('auth');

// Route::get('/outlet/{slug}/locale/{locale}',function($locale){
// 	Session::put('locale', $locale);
//     	return redirect()->back();
// });

// Route::get('/outlet/{slug}/ordersentkitchen',function(){
// 	return view('order_sent_kitchen');
// })->middleware('auth');

// Route::post('/outlet/{slug}/confirm_items','KitchenController@confirm');

Route::group(['prefix' => '/outlet/{slug}/'], function(){

Route::get('menu','MenuController@getItems');

Route::post('add_item','MenuController@addItem')->name('add.item');

// Route::get('offers',function(){
// 	return view('offers');
// });

Route::get('kitchen','KitchenController@getItems')->name('kitchen');

Route::post('kitchen_update','KitchenController@updateItems');

Route::get('address','AddressController@getDetails')->middleware('auth');

// route for make payment request using post method
Route::post('dopayment', 'RazorpayController@dopayment')->name('dopayment')->middleware('auth');

//add address
Route::post('add_address','AddressController@add')->name('add.address')->middleware('auth');

Route::get('locale/{locale}',function($locale){
	Session::put('locale', $locale);
    	return redirect()->back();
});

Route::get('ordersentkitchen','KitchenController@ordersentkitchen')->middleware('auth');

Route::post('confirm_items','KitchenController@confirm');

Route::post('check_status','KitchenController@check_status');

}) ; 


Auth::routes(['verify'=>true]);

Route::get('home', 'HomeController@index')->name('home')->middleware('verified');