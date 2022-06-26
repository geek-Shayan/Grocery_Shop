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

    public function productView($product_id)
    {
        $product = Product::find($product_id);
 
        // $sold_items = SoldItem::join('products', 'sold_items.product_id', '=', 'products.id')
        //     ->select('products.name', 'products.sku', 'products.description', 'sold_items.quantity', 'sold_items.selling_price')
        //     ->where('sold_items.invoice_id', '=', $invoice_id)
        //     ->get();

   
        return view('/internals/view_product', compact('product'));
    }

    public function addNew()
    {      
       return view('internals/new_product');
       //Route::post('products/new/save', 'ProductController@saveNew');
    }

    public function saveNew(Request $request)
    {     
        $valid_data = request()->validate([
            'name' => 'required|min:3',
            'sku' => 'required',
            'description' => 'required',
            'available_quantity' => 'required',
            'purchase_price' => 'required',
            'profit_range' => 'required',
            'image' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $product = new Product();
        $product->name = $request -> name; 
        $product->sku = $request -> sku;
        $product->description = $request -> description; 
        $product->available_quantity = $request -> available_quantity; 
        $product->purchase_price = $request -> purchase_price;
        $product->profit_range = $request -> profit_range; 
        $product->selling_price = $request -> purchase_price + $request -> profit_range;


        $imageName = $request->sku.'_'.time().'.'.$request->image->extension();  
     
        // $request->image->move(public_path('images'), $imageName);
        $request->image->storeAs('images', $imageName);
        // storage/app/images/file.png
  
        /* Store $imageName name in DATABASE from HERE */
        $product->image = $imageName;

    
        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('image',$imageName);



        $product -> save(); 
        return redirect('/products');      
    }


    public function updateProduct($id)
    {
        $product = Product::find($id);
        return view('/internals/update_product', compact('id','product'));
    }

    public function updateProductSave(Request $request , $id)
    {
        $valid_data = request()->validate([
            'name' => 'required|min:3',
            'sku' => 'required',
            'description' => 'required',
            'available_quantity' => 'required',
            'purchase_price' => 'required',
            'profit_range' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request -> name; 
        $product->sku = $request -> sku;
        $product->description = $request -> description; 
        $product->available_quantity = $request -> available_quantity; 
        $product->purchase_price = $request -> purchase_price;
        $product->profit_range = $request -> profit_range; 
        // $product->selling_price = $request -> selling_price;
        $product->selling_price = $request -> purchase_price + $request -> profit_range;
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