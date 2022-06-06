<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\Sold_items;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $r)  
    {
        echo "hi order";
        return view('internals/order');
    }

    public function checkOrder(Request $r)  
    {
        echo "hi check order";
        //return view('internals/order');
    }


}
