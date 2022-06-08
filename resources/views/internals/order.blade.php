@extends('layout')


@section('content')
    <h1>ORDER</h1>
    {{-- @php
    use App\Product;
    use App\SoldItem;
        $product= new Product();   
        $sold_items = New SoldItem(); 

    @endphp --}}
    

    <form align= "center" action={{ route('order.confirm' ), }} method="post">
        {{@csrf_field()}}
            {{-- <h6>NAME        :       <input type="text" name="name" id=""> <br></h6> 
            <h6>SKU         :       <input type="text" name="sku" id=""> <br></h6>
            <h6>DESCRIPTION :       <input type="text" name="description" id=""> <br></h6>
            <h6>A_QUANTITY  :       <input type="number" name="available_quantity" id=""> <br></h6>
            <h6>P_PRICE     :       <input type="number" name="purchase_price" id=""> <br></h6> --}}

            <table align="center">
                <tr>
                    <th>
                        PRODUCTS
                    </th>

                    <th>
                        QUANTITY
                    </th>

                    <th>
                        PRICE
                    </th>
                </tr>

                @foreach ($products as $product)
                
                <tr align="left">
                    
                    <th >
                        <input type="checkbox" id="{{$product->id}}" name="{{$product->name}}" value="{{$product->id}}">
                        {{$product->name}} [{{$product->sku}}] {{$product->description}}
                    </th>

                    <td >
                        <input type="number" id="{{$product->id}}" name="{{$product->name}}" > 
                        {{-- value="{{$product->available_quantity}}" --}}
                    </td>
                    
                    <td>
                        <input type="number" id="{{$product->id}}" name="{{$product->name}}" >
                        {{-- value="{{$product->purchase_price}}" --}}
                    </td>


                </tr>
                @endforeach

            </table>

            {{-- @foreach ($products as $product)

                <input type="checkbox" id="{{$product->id}}" name="{{$product->id}}" value="{{$product->id}}">
                {{$product->name}} [{{$product->sku}}] {{$product->description}}
                <input type="number" id="{{$product->id}}" name="{{$product->id}}" value="{{$product->available_quantity}}">
                <br> --}}

                {{-- <label for="{{$product->name}}">{{$product->name}}</label><br> --}}


            {{-- <tr>
                <td align= "center">{{$product->id}}</td>
                <td align= "center">{{$product->name}}</td>
                <td align= "center">{{$product->sku}}</td>
                <td align= "center">{{$product->description}}</td>
                <td align= "center">{{$product->available_quantity}}</td>
                <td align= "center">{{$product->purchase_price}}</td>
                <td>UPDATE</td>
                <td>DELETE</td>
                <td><a href="/products/update/{{$product->id}}">update</a></td>
                <td><a href="/products/delete/{{$product->id}}">delete</a></td>
    
            </tr> --}}

            {{-- @endforeach --}}
            
                {{-- <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                <label for="vehicle1"> I have a bike</label><br>
                <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                <label for="vehicle2"> I have a car</label><br>
                <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                <label for="vehicle3"> I have a boat</label><br><br>
                <input type="button" id="v" name="veh" value="Sub"> --}}

{{--             
                @foreach($product as $product)
                
                <input type="checkbox" id="id" name="name" value={{$product->id}} > {{$product->name}}
               
                @endforeach --}}
            

                
             
            
            
            <br>
            <input type="submit" onclick="alert('Order Comfirmed!')" value="Confirm">
        </form>
@endsection