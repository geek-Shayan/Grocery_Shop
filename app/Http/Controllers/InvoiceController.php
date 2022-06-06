<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\Sold_items;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoiceList()
    {
        $invoice = new Invoice();
        $invoice->invoice_number = 100; 
        $invoice->customer_email = 'example@example.com';
        $invoice->total = 80; 
        $invoice->payment_method = 'cash'; 
        $invoice->date= '6/6/22';
        $invoice->save();

        //return redirect('internals/invoices');

        // $invoices = invoice::all();
        // return view('internals/invoices', compact('invoices'));

    }
}
