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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'home');

//PRODUCTS
//Route::view('products', 'internals/products');
Route::get('products', 'ProductController@productList');

//NEW ITEM
Route::post('products/new', 'ProductController@addNew');
Route::post('products/new/save', 'ProductController@saveNew');

//UPDATE

//ORDER
//Route::view('order', 'internals/order');
Route::get('order', 'OrderController@order');
Route::post('order/done', 'OrderController@checkOrder');


//INVOICES
// Route::view('invoices', 'internals/invoices');
Route::get('invoices', 'InvoiceController@invoicetList');

//Route::view('products', 'internals/products');