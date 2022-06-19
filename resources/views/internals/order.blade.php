@extends('layout')


@section('content')
    <h1>ORDER</h1>

    <style>
        table {
          border-collapse: collapse;
          width: 80%;
        }
        
        th, td {
          text-align: center;
          padding: 5px;
        }
        
        tr:nth-child(even) {
          background-color: #D6EEEE;
        }

        tr:nth-child(1) {
          background-color: #35947f;
        }
    </style>

{{-- <form oninput="x.value=parseInt(a.value)">
            <input type="range" id="a" value="50"> 
            +<input type="number" id="b" value="25">
             =<output name="x" for="a "></output>
            </form> --}}


        <form align= "center" action={{ route('order.confirm') }} method="post" onsubmit="return processCart()">
        @csrf

            <table align= "center">
                <tr align= "center">
                    <th><th></th> </th>
                </tr>
      
                <tr align= "left">
                    <th>CUSTOMER EMAIL:</th> 
                    <td><input type="text" name="customer_email" id=""> </td>
                </tr>

                <tr align= "left">
                    <th>PAYMENT METHOD:</th>
                    <td><input type="text" name="payment_method" id=""> </td>
                </tr>
                <tr align= "left">
                    <th>DATE:</th>
                    <td><input type="date" name="date" id=""> </td>
                </tr>
                    
            </table>
            
            <br>

            

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
                            <input type="checkbox" id="{{$product->id}}" class="product-checkboxes" value="{{$product->id}}">
                            {{$product->name}} [{{$product->sku}}] {{$product->description}}
                        </th>

                        <td >
                            <input type="number" placeholder="{{$product->available_quantity}}" id="quantity{{$product->id}}"  >
                        </td>
                        
                        <td>
                            <input type="number" placeholder="{{$product->id}}" id="selling_price{{$product->id}}" > 
                            {{-- value="0" --}}
                        </td>

                    </tr>
                    @endforeach
            </table>

            <input type="hidden" id="cart" name="cart">
            
            <br>
            <input type="submit" value="Confirm">
        </form>



    <script>

        function processCart()
        {
            let product_checkboxes = document.getElementsByClassName("product-checkboxes");

            let cart = [];

            // console.log(product_checkboxes);

            for(let i=0; i<product_checkboxes.length; i++)
            {
                // console.log(product_checkboxes[i].checked);
                if(product_checkboxes[i].checked)
                {
                    let obj = {
                        product_id: product_checkboxes[i].id,
                        quantity: document.getElementById("quantity" + product_checkboxes[i].id).value,
                        selling_price: document.getElementById("selling_price" + product_checkboxes[i].id).value
                    }

                    cart.push(obj);
                }
            }

            // console.log(cart);

            if(cart.length > 0)
            {
                cart = JSON.stringify(cart);

                document.getElementById("cart").value = cart;

                return true;
            }
            else
            {
                return false;
            }
        }

    </script>

@endsection