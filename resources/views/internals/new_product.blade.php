@extends('layout')

@section('content')
    <h1 >NEW PRODUCT</h1>
    
    <form align= "center" action="/products/new/save" method="post">
        {{@csrf_field()}}
            <h6>NAME        :       <input type="text" name="name" id=""> <br></h6> 
            <h6>SKU         :       <input type="text" name="sku" id=""> <br></h6>
            <h6>DESCRIPTION :       <input type="text" name="description" id=""> <br></h6>
            <h6>A_QUANTITY  :       <input type="number" name="available_quantity" id=""> <br></h6>
            <h6>P_PRICE     :       <input type="number" name="purchase_price" id=""> <br></h6>
            
            
            <br>
            <input type="submit" onclick="alert('New Item Saved!')" value="Save New Item">
        </form>


@endsection        