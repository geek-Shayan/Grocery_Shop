<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\SoldItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderList()
    {
        // $invoice = Invoice::find(6);
        //dd($invoice->soldItems()->delete());

        // $product = new Product();
        // $product->name= 'apple'; 
        // $product->sku= '20KR';
        // $product->description= 'fruit'; 
        // $product->available_quantity = 80; 
        // $product->purchase_price= 15;
        // $product->save();

        //return redirect('internals/products');

        $products = Product::all();
        //$orders = SoldItem::all();
// route('internals/order')
        return view('internals/order', compact('products'));
        // return view('internals/order', compact('products', 'orders'));

    }
    // public function order(Request $r)  
    // {
    //     echo "hi order";
    //     return view('internals/order');
    // }

    public function saveOrder(Request $request)  
    {
       
        
        $cart = json_decode($request->cart, true);
        // dd($cart);
        // dd(count($cart));
        // GET THE VALUES FOR SOLD ITEMS FROM ORDER AND CREATE INVOICE

        $invoice = new Invoice();
        $number =1000 + $invoice->id;
        $invoice->invoice_number = $number;

        $invoice->customer_email = $request -> customer_email;
        $invoice->payment_method = $request -> payment_method; 
        $invoice->date = $request -> date;
        $invoice -> save();

        //$order->invoice_id = $request -> description; // create invoice and save
        
        //return redirect('/invoices/new'); 
        // invoices/new
        //return view('internals/new_invoice');

        // $invoiceController =new InvoiceController();
        // $order->invoice_id = $invoiceController->addNew();

        // $cart->pluck('product_id');
        // $cart->pluck('quantity');
        // $cart->pluck('selling_price');

//////PROBLEM

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

////////////////
       
        $invoice -> total = $total;
        $invoice -> save();

        // $Iid = $invoice->id;


        return redirect('/invoices'); 

        // return view('/internals/new_invoice', compact('Iid'));
        // return view('/internals/update_product', compact('id'));


        //////////////////////////
        // $invoice->id
        // $invoice->invoice_number
        // $invoice->customer_email
        // $invoice->total
        // $invoice->payment_method
        // $invoice->date
        ////////////////////////////

        // $invoice = Invoice::find($id);
        // return view('/internals/update_invoice', compact('id'));

        // $order->invoice_id = $invoice->id; 

        
        //return redirect('/invoices/new', compact('invoice')); 
         

        //$invoice = new Invoice();
        // $invoice->invoice_number = $request -> invoice_number; 
        // $invoice->customer_email = $request -> customer_email;
        // $invoice->total = $request -> total; 
        // $invoice->payment_method = $request -> payment_method; 
        // $invoice->date = $request -> date;
        // $invoice -> save(); 
        // return redirect('/invoices');

        // $order -> save(); 
        // return redirect('/invoices/new'); 

        // return view('/internals/update_product', compact('id'));
    }




}
