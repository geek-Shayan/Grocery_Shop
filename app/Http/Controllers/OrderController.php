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
    // ALL ORDER
    public function orderList()
    {
        $products = Product::all();
        return view('internals/order', compact('products'));
    }


    // SAVE ORDER (CREATES NEW INVOICE + SENDS INVOICE MAIL TO CUSTOMER)
    public function saveOrder(Request $request)  
    {
        $cart = json_decode($request->cart, true); // GETS JSON OF SOLD ITEMS FOR INVOICE 
        // dd($cart);
        // dd(count($cart));


        // GET THE VALUES FOR SOLD ITEMS FROM ORDER AND CREATE INVOICE
        $invoice = new Invoice();
        // $invoice -> profit = 0; // INITIALIZED BEFORE BECAUSE NOT NULLABLE
        $invoice -> save();

        $number = $invoice->id + 1000;
        $invoice->invoice_number = $number;
        $invoice->customer_email = $request -> customer_email;
        $invoice->payment_method = $request -> payment_method;
        $invoice->date = $request -> date;
        $invoice -> save();

        $total = 0;
        
        foreach ($cart as $item)
        {
            $order = new SoldItem();
            $order->product_id = $item['product_id']; // PRODUCTS ON LOOP
            $order->invoice_id = $invoice->id;
            $order->quantity = $item['quantity']; 
            $order->selling_price = $item['selling_price'];
            $order-> save();
            
            // TOTAL CALCULATION FOR DB
            $total += $order->quantity * $order->selling_price;
        }
        
        $invoice -> total = $total;
        $invoice -> save();
        
        // PROFIT CALCULATION FOR DB
        $sold_items = SoldItem::join('products', 'sold_items.product_id', '=', 'products.id')
            ->select('products.id', 'products.purchase_price', 'sold_items.quantity', 'sold_items.selling_price')
            ->where('sold_items.invoice_id', '=', $invoice->id)
            ->get();
        
        $profit = 0;
        
        foreach ($sold_items as $sold_item)
        {
            $profit += ($sold_item->quantity * $sold_item->selling_price) - ($sold_item->quantity *$sold_item->purchase_price);
        }

        $invoice -> profit = $profit;
        $invoice -> save();


        // MAIL TO CUSTOMER
        Mail::to($invoice->customer_email)->send(new InvoiceMail($invoice->id));


        // REGISTER 
        
        // dump('registerd !');

        //MSG TO ADMIN

        // dump("msg to admin");

        return redirect('/invoices'); 

        ////////////////////////////////////
        // $invoice->id
        // $invoice->invoice_number
        // $invoice->customer_email
        // $invoice->total
        // $invoice->payment_method
        // $invoice->date
        ////////////////////////////////////
   
    }
}
