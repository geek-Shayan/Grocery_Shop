@extends('layout')


@section('content')
    <h1>ORDER</h1>

        <form align= "center" action={{ route('order.confirm') }} method="post" onsubmit="return processCart()">
        @csrf

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
                            <input type="number" id="quantity{{$product->id}}" value ="0" >
                        </td>
                        
                        <td>
                            <input type="number" id="selling_price{{$product->id}}" value="0">
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