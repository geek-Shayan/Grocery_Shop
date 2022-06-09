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

//NEW PRODUCT
Route::post('products/new', 'ProductController@addNew');
Route::post('products/new/save', 'ProductController@saveNew');

//UPDATE PRODUCT
Route::get('products/update/{id}', 'ProductController@updateProduct');
Route::post('products/update/{id}', 'ProductController@updateProductSave');

//DELETE PRODUCT
Route::get('products/delete/{id}', 'ProductController@deleteProduct');

//ORDER
//Route::view('order', 'internals/order');
Route::get('order', 'OrderController@orderList');
Route::post('order', 'OrderController@saveOrder')->name('order.confirm');


//INVOICES
// Route::view('invoices', 'internals/invoices');
Route::get('invoices', 'InvoiceController@invoiceList');
//Route::view('products', 'internals/products');

//NEW INVOICES
//Route::get('invoices/new', 'InvoiceController@addNew');
Route::post('invoices/new', 'InvoiceController@addNew');
Route::post('invoices/new/save', 'InvoiceController@saveNew');

//UPDATE INVOICES
Route::get('invoices/update/{id}', 'InvoiceController@updateInvoice');
Route::post('invoices/update/{id}', 'InvoiceController@updateInvoiceSave');

//DELETE INVOICES
Route::get('invoices/delete/{id}', 'InvoiceController@deleteInvoice');







//update
//Route::get('students/edit/{id}', 'StudentController@findStudent');


//delete
// Route::get('students/delete/{id}', 'StudentController@deleteStudent');