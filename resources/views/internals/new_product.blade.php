@extends('layout')

@section('content')
    <h1 >NEW PRODUCT</h1>
    
    <form align= "center" action="/products/new/save" method="post">
        {{@csrf_field()}}
            <h6>NAME        :       <input type="text" name="name" id=""> <br></h6> 
            <h6>SKU         :       <input type="text" name="sku" id=""> <br></h6>
            <h6>DESCRIPTION :       <input type="text" name="description" id=""> <br></h6>
            <h6>AVAILABLE QUANTITY  :       <input type="number" name="available_quantity" id=""> <br></h6>
            <h6>PURCHASE PRICE     :       <input type="number" name="purchase_price" id=""> <br></h6>
            <h6>PROFIT RANGE  :       <input type="number" name="profit_range" id=""> <br></h6>
            <h6>SELLING PRICE     :       <input type="number" name="selling_price" id=""> <br></h6>
            
            
            <br>
            <input type="submit" onclick="alert('New Item Saved!')" value="Save New Item">
        </form>


@endsection        