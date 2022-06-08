<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\SoldItem;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoiceList()
    {
        // $invoice = new Invoice();
        // $invoice->invoice_number = 100; 
        // $invoice->customer_email = 'example@example.com';
        // $invoice->total = 80; 
        // $invoice->payment_method = 'cash'; 
        // $invoice->date= '6/6/22';
        // $invoice->save();

        // return redirect('/invoices');

        $invoices = invoice::all();
        return view('internals/invoices', compact('invoices'));
    }

    public function addNew()
    {      
       return view('internals/new_invoice');
    }

    // public function saveNew(Request $r)
    // {     
    //     $product = new Product();
    //     $product->name = $r -> name; 
    //     $product->sku = $r -> sku;
    //     $product->description = $r -> description; 
    //     $product->available_quantity = $r -> available_quantity; 
    //     $product->purchase_price = $r -> purchase_price;
    //     $product -> save(); 
    //     return redirect('/products');      
    // }

    public function updateInvoice($id)
    {
        $invoice = Invoice::find($id);
        return view('/internals/update_invoice', compact('id'));
    }

    public function updateInvoiceSave(Request $r , $id)
    {
        $invoice = Invoice::find($id);
        $invoice->invoice_number = $r -> invoice_number; 
        $invoice->customer_email = $r -> customer_email;
        $invoice->total = $r -> total; 
        $invoice->payment_method = $r -> payment_method; 
        $invoice->date = $r -> date;
        $invoice -> save(); 
        
        return redirect('/invoices');  
    }

    public function deleteInvoice($id)
    {
        $invoice = Invoice::find($id)->delete();
        return redirect ('/invoices');
    }
}
