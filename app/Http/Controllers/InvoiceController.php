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

    public function invoiceView($invoice_id)
    {
        $invoice = Invoice::find($invoice_id);
 
        $sold_items = SoldItem::join('products', 'sold_items.product_id', '=', 'products.id')
            ->select('products.name', 'products.sku', 'products.description', 'sold_items.quantity', 'sold_items.selling_price')
            ->where('sold_items.invoice_id', '=', $invoice_id)
            ->get();

        // dd($orders);
        // dd($invoice);
        return view('/internals/view_invoice', compact('invoice', 'sold_items'));
    }


    public function addNew()
    {      
       return view('internals/new_invoice');
    }

    public function saveNew(Request $request)
    {     
        $invoice = new Invoice();
        $invoice -> save(); 
        
        $number =1000 + $invoice->id;
        $invoice->invoice_number = $number;

        $invoice->customer_email = $request -> customer_email;
        //$invoice->total = $request -> total; 
        $invoice->payment_method = $request -> payment_method; 
        $invoice->date = $request -> date;
        $invoice -> save(); 
        return redirect('/invoices');      
    }


    public function updateInvoice($id)
    {
        $invoice = Invoice::find($id);
        return view('/internals/update_invoice', compact('id','invoice'));
    }

    public function updateInvoiceSave(Request $r , $id)
    {
        $invoice = Invoice::find($id);

        $number =1000 + $invoice->id;
        $invoice->invoice_number = $number;

        $invoice->customer_email = $r -> customer_email;
        // $invoice->total = $r -> total; 
        $invoice->payment_method = $r -> payment_method; 
        $invoice->date = $r -> date;
        $invoice -> save(); 
        
        return redirect('/invoices');  

    }

    public function deleteInvoice($id)
    {
        // $sold_items = SoldItem::
        $invoice = Invoice::find($id);
        $invoice->soldItems()->delete();
        $invoice->delete();

        return redirect ('/invoices');
    }
}
