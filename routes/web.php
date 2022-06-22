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


/////////////////////////////////
//INVOICE ON ORDER
// Route::get('order/invoices', 'InvoiceController@InvoiceAddOnOrder');
// Route::post('order/invoices', 'InvoiceController@InvoiceSaveOnOrder');
// InvoiceSaveOnOrder

// return redirect('/order/invoices',compact('Iid')); 
// InvoiceAddOnOrder
///////////////////////////////

//INVOICES
// Route::view('invoices', 'internals/invoices');
Route::get('invoices', 'InvoiceController@invoiceList');

//INVOICE VIEW INDIVIDUAL
Route::get('invoices/view/{id}', 'InvoiceController@invoiceView');

//INVOICE VIEW INDIVIDUAL PDF
Route::get('invoices/view/pdf/{id}', 'PDFController@generatePDF');

//INVOICE VIEW INDIVIDUAL PDF DOWNLOAD
Route::get('invoices/view/pdf/download/{id}', 'PDFController@downloadPDF');

//INVOICE VIEW INDIVIDUAL PDF MAIL
// Route::view('invoices/view/pdf/email/{id}', 'pdfs/invoice_pdf');
Route::get('invoices/view/pdf/email/{id}', 'PDFController@mailPDF');

////////////////////////////////
//NEW INVOICES
//  Route::get('invoices/new', 'InvoiceController@addNew');
//  //Route::post('invoices/new', 'InvoiceController@addNew');
//  Route::post('invoices/new/save/{id}', 'InvoiceController@saveNew');
// //  Route::post('invoices/new/save/{id}', 'InvoiceController@InvoiceSaveOnOrder');
///////////////////////////////

 

//UPDATE INVOICES
Route::get('invoices/update/{id}', 'InvoiceController@updateInvoice');
Route::post('invoices/update/{id}', 'InvoiceController@updateInvoiceSave');
////////////////////////////////

//DELETE INVOICES
Route::get('invoices/delete/{id}', 'InvoiceController@deleteInvoice');



//INSIGHT
Route::view('insight', 'internals/insight');

