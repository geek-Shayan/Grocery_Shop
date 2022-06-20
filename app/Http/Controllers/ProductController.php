<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\SoldItem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        // $product = new Product();
        // $product->name= 'apple'; 
        // $product->sku= '20KR';
        // $product->description= 'fruit'; 
        // $product->available_quantity = 80; 
        // $product->purchase_price= 15;
        // $product->profit_range = 5; 
        // $product->selling_price = 20;
        // $product->save();

        //return redirect('internals/products');

        $products = Product::all();
        return view('internals/products', compact('products'));

    }

    public function addNew()
    {      
       return view('internals/new_product');
       //Route::post('products/new/save', 'ProductController@saveNew');
    }

    public function saveNew(Request $r)
    {     
        $product = new Product();
        $product->name = $r -> name; 
        $product->sku = $r -> sku;
        $product->description = $r -> description; 
        $product->available_quantity = $r -> available_quantity; 
        $product->purchase_price = $r -> purchase_price;
        $product->profit_range = $r -> profit_range; 
        // $product->selling_price = $r -> selling_price;
        $product->selling_price = $r -> purchase_price + $r -> profit_range;
        $product -> save(); 
        return redirect('/products');      
    }


    public function updateProduct($id)
    {
        $product = Product::find($id);
        return view('/internals/update_product', compact('id','product'));
    }

    public function updateProductSave(Request $r , $id)
    {
        $product = Product::find($id);
        $product->name = $r -> name; 
        $product->sku = $r -> sku;
        $product->description = $r -> description; 
        $product->available_quantity = $r -> available_quantity; 
        $product->purchase_price = $r -> purchase_price;
        $product->profit_range = $r -> profit_range; 
        // $product->selling_price = $r -> selling_price;
        $product->selling_price = $r -> purchase_price + $r -> profit_range;
        $product -> save(); 
        
        return redirect('/products');  
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id)->delete();
        return redirect ('/products');
    }

    
}

?>