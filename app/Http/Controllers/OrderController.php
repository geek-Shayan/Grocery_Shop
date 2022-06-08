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
        // $product = new Product();
        // $product->name= 'apple'; 
        // $product->sku= '20KR';
        // $product->description= 'fruit'; 
        // $product->available_quantity = 80; 
        // $product->purchase_price= 15;
        // $product->save();

        //return redirect('internals/products');

        $products = product::all();
        return view('internals/order', compact('products'));

    }
    // public function order(Request $r)  
    // {
    //     echo "hi order";
    //     return view('internals/order');
    // }

    public function checkOrder(Request $request)  
    {
        //echo "hi check order";
        dd($request->all());
        //return view('internals/order');
    }


}
