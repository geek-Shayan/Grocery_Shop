@extends('layouts.layout')

@section('content')
    <div class="container-fluid bg-success">
        <h3>UPDATE PRODUCT</h3>    
    </div>
    {{-- "/products/update/{{$id}}" --}}
    <form align= "center" action={{ route('products.update.save',$product->id) }} method="post">
        {{@csrf_field()}}
            {{-- <h6>id:         <input type="number" name="id" id=""> <br></h6> --}}
            <h6>NAME        :               <input type="text" placeholder="{{$product->name}}" name="name" id=""> <br></h6> 
            <h6>SKU         :               <input type="text" placeholder="{{$product->sku}}" name="sku" id=""> <br></h6>
            <h6>DESCRIPTION :               <input type="text" placeholder="{{$product->description}}" name="description" id=""> <br></h6>
            <h6>AVAILABLE QUANTITY  :       <input type="number" placeholder="{{$product->available_quantity}}" name="available_quantity" id=""> <br></h6>
            <h6>PURCHASE PRICE     :        <input type="number" placeholder="{{$product->purchase_price}}" name="purchase_price" id=""> <br></h6>
            <h6>PROFIT RANGE  :             <input type="number" placeholder="{{$product->profit_range}}" name="profit_range" id=""> <br></h6>
            {{-- <h6>SELLING PRICE     :         <input type="number" placeholder="{{$product->selling_price}}" name="selling_price" id=""> <br></h6> --}}
            <br>
            
            <input type="submit" onclick="alert('Update Saved!')" value="Update">
        </form>


@endsection   