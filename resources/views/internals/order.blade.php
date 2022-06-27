@extends('layouts.layout')

{{-- $table->integer('profit')->after('total')->nullable(); --}}
@section('content')

    <div class="container-fluid bg-success">
        <h3>ORDER</h3>   
    </div>

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

            {{-- <form action="/action_page.php">
                <label for="vol">Volume (between 0 and 50):</label>
                <input type="range" id="vol" name="vol" min="0" max="50">
                <input type="submit">
            </form> --}}

        <form align= "center" action={{ route('order.confirm') }} method="post" onsubmit="return processCart()">
        @csrf
             
            <table align= "center">
                <tr>
                    <th colspan="2"> CUSTOMER INFORMATION </th>
                </tr>
      
                <tr align= "left">
                    <th>CUSTOMER EMAIL:</th> 
                    <td><input type="text" name="customer_email" id=""> </td>
                </tr>

                <tr align= "left">
                    <th>PAYMENT METHOD:</th>
                    {{-- <td><input type="text" name="payment_method" id=""> </td> --}}
                    <td>
                        <select name="payment_method" id="">
                            <option value="cash">Cash</option>
                            <option value="card">Card</option>
                            <option value="cheque">Cheque</option>
                            <option value="bkash">Bkash</option>
                        </select>
                    </td>
                </tr>
                
                <tr align= "left">
                    <th>DATE:</th>
                    <td><input type="date" name="date" id=""> </td>
                </tr>
            </table>
            
            <br>

            <table align="center">
                <tr>
                    <th>PRODUCTS</th>
                    <th>QUANTITY</th>
                    <th>PRICE</th>
                </tr>

                @foreach ($products as $product)
                <tr>
                    @if ($product->available_quantity > 0)
                    <th >
                        <input align="left" type="checkbox" id="{{$product->id}}" class="product-checkboxes" value="{{$product->id}}">
                        {{$product->name}} [{{$product->sku}}] {{$product->description}}
                    </th>
                    
                    <td>
                        <input type="number" placeholder="{{$product->available_quantity}}" id="quantity{{$product->id}}">
                    </td>  
                    
                    <td>
                        <input type="number" placeholder="{{$product->selling_price}}   (P-{{$product->purchase_price}})" id="selling_price{{$product->id}}">
                    </td> 
                    @else
                    <th class="text-danger">{{$product->name}} [{{$product->sku}}] {{$product->description}}</th>
                    <td class="text-danger">Not available!</td>
                    <td class="text-danger">Not available!</td>
                    @endif
                    
                    {{-- <th >
                        <input align="left" type="checkbox" id="{{$product->id}}" class="product-checkboxes" value="{{$product->id}}">
                        {{$product->name}} [{{$product->sku}}] {{$product->description}}
                    </th> --}}
                    
                    {{-- <td >
                        <input type="number" placeholder="{{$product->available_quantity}}" id="quantity{{$product->id}}" >
                    </td> --}}
                    
                    {{-- <td>
                        <input type="number" placeholder="{{$product->selling_price}}   (P-{{$product->purchase_price}})" id="selling_price{{$product->id}}" > 
                    </td> --}}
                    
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