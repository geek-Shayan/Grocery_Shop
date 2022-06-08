@extends('layout')

@section('content')
    <h1>UPDATE PRODUCT</h1>
    
    <form align= "center" action="/products/update/{{$id}}" method="post">
        {{@csrf_field()}}
            {{-- <h6>id:         <input type="number" name="id" id=""> <br></h6> --}}
            <h6>NAME        :       <input type="text" name="name" id=""> <br></h6> 
            <h6>SKU         :       <input type="text" name="sku" id=""> <br></h6>
            <h6>DESCRIPTION :       <input type="text" name="description" id=""> <br></h6>
            <h6>AVAILABLE QUANTITY  :       <input type="number" name="available_quantity" id=""> <br></h6>
            <h6>PURCHASE PRICE     :       <input type="number" name="purchase_price" id=""> <br></h6>
            <br>
            
            <input type="submit" onclick="alert('Update Saved!')" value="Update">
        </form>


@endsection   