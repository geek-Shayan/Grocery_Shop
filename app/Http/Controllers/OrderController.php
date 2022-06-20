<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\SoldItem;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function orderList()
    {
        $products = Product::all();
        return view('internals/order', compact('products'));

    }

    public function saveOrder(Request $request)  
    {
        $cart = json_decode($request->cart, true);
        // dd($cart);
        // dd(count($cart));
        // GET THE VALUES FOR SOLD ITEMS FROM ORDER AND CREATE INVOICE

        $invoice = new Invoice();
        $invoice -> save();

        $number = $invoice->id + 1000;
        $invoice->invoice_number = $number;

        $invoice->customer_email = $request -> customer_email;
        $invoice->payment_method = $request -> payment_method; 
        $invoice->date = $request -> date;
        $invoice -> save();

        $total=0;

        foreach ($cart as $item)
        {
            $order = new SoldItem();
            $order->product_id = $item['product_id']; //product id loop

            $order->invoice_id = $invoice->id;
            $order->quantity = $item['quantity']; 
            $order->selling_price = $item['selling_price'];
            $order -> save();

            $total += $order->quantity * $order->selling_price;

        }

        $invoice -> total = $total;
        $invoice -> save();

        ///////MAIL
        Mail::to($invoice->customer_email)->send(new InvoiceMail($invoice->id));


        // REGISTER 
        
        // dump('registerd !');

        //MSG TO ADMIN

        // dump("msg to admin");

        return redirect('/invoices'); 

        //////////////////////////
        // $invoice->id
        // $invoice->invoice_number
        // $invoice->customer_email
        // $invoice->total
        // $invoice->payment_method
        // $invoice->date
        ////////////////////////////
   
    }
}
