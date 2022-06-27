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

Route::view('/', 'home')->name('home');

//PRODUCTS
Route::get('products', 'ProductController@productList')->name('products');

//NEW PRODUCT
Route::get('products/new', 'ProductController@addNew')->name('products.new');
Route::post('products/new', 'ProductController@addNew')->name('products.new');
Route::post('products/new/save', 'ProductController@saveNew')->name('products.new.save');

//PRODUCT VIEW INDIVIDUAL
Route::get('products/view/{id}', 'ProductController@productView')->name('products.view');

//PRODUCT RESTOCK
Route::get('products/restock/{id}', 'ProductController@restockProduct')->name('products.restock');
Route::post('products/restock/{id}', 'ProductController@restockProductSave')->name('products.restock.save');

//UPDATE PRODUCT
Route::get('products/update/{id}', 'ProductController@updateProduct')->name('products.update');
Route::post('products/update/{id}', 'ProductController@updateProductSave')->name('products.update.save');

//DELETE PRODUCT
Route::get('products/delete/{id}', 'ProductController@deleteProduct')->name('products.delete');

//INVOICES
Route::get('invoices', 'InvoiceController@invoiceList')->name('invoices');

////////////////////////////////
//NEW INVOICES
//  Route::get('invoices/new', 'InvoiceController@addNew');
//  //Route::post('invoices/new', 'InvoiceController@addNew');
//  Route::post('invoices/new/save/{id}', 'InvoiceController@saveNew');
// //  Route::post('invoices/new/save/{id}', 'InvoiceController@InvoiceSaveOnOrder');
///////////////////////////////

//INVOICE VIEW INDIVIDUAL
Route::get('invoices/view/{id}', 'InvoiceController@invoiceView')->name('invoices.view');

//INVOICE VIEW INDIVIDUAL PDF
Route::get('invoices/view/pdf/{id}', 'PDFController@generatePDF')->name('invoices.view.pdf');

//INVOICE VIEW INDIVIDUAL PDF DOWNLOAD
Route::get('invoices/view/pdf/download/{id}', 'PDFController@downloadPDF')->name('invoices.view.pdf.download');

//INVOICE VIEW INDIVIDUAL PDF MAIL
Route::get('invoices/view/pdf/email/{id}', 'PDFController@mailPDF')->name('invoices.view.pdf.email');

//UPDATE INVOICES
Route::get('invoices/update/{id}', 'InvoiceController@updateInvoice')->name('invoices.update');
Route::post('invoices/update/{id}', 'InvoiceController@updateInvoiceSave')->name('invoices.update.save');

//DELETE INVOICES (DELETES ALSO ORDERS INSIDE INVOICE)
Route::get('invoices/delete/{id}', 'InvoiceController@deleteInvoice')->name('invoices.delete');

//ORDER (CREATES NEW INVOICE)
Route::get('order', 'OrderController@orderList')->name('orders');
Route::post('order', 'OrderController@saveOrder')->name('order.confirm');

//INSIGHT
Route::view('insight', 'internals/insight')->name('insight');

