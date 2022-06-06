@extends('layout')

@section('content')
    <h1>ORDER</h1>

    <form align= "center" action="/order/done" method="post">
        {{@csrf_field()}}
            {{-- <h6>NAME        :       <input type="text" name="name" id=""> <br></h6> 
            <h6>SKU         :       <input type="text" name="sku" id=""> <br></h6>
            <h6>DESCRIPTION :       <input type="text" name="description" id=""> <br></h6>
            <h6>A_QUANTITY  :       <input type="number" name="available_quantity" id=""> <br></h6>
            <h6>P_PRICE     :       <input type="number" name="purchase_price" id=""> <br></h6> --}}

            
                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                <label for="vehicle1"> I have a bike</label><br>
                <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                <label for="vehicle2"> I have a car</label><br>
                <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                <label for="vehicle3"> I have a boat</label><br><br>
                <input type="button" id="v" name="veh" value="Sub">

{{--             
                @foreach($product as $product)
                
                <input type="checkbox" id="id" name="name" value={{$product->id}} > {{$product->name}}
               
                @endforeach --}}
            

                
             
            
            
            <br>
            <input type="submit" onclick="alert('Order Comfirmed!')" value="Confirm">
        </form>
@endsection