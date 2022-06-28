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

        .wrapper{
            display: grid;
            /* grid-auto-columns:100px; */
            grid-template-columns: 40% 60% ;
            gap: 1em;
        }
        .wrapper>div{   
            background-color: #56b379;
            padding: 1em;
        }

        .wrapper>div:nth-child(odd){
            background-color: rgb(190, 199, 108);
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


        {{-- <div class="wrapper">
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolore?</div>
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quisquam ab consectetur voluptas culpa quos vitae nam quis distinctio consequatur!</div>
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolore?</div>
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quisquam ab consectetur voluptas culpa quos vitae nam quis distinctio consequatur!</div>
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolore?</div>
            <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quisquam ab consectetur voluptas culpa quos vitae nam quis distinctio consequatur!</div>
        </div> --}}

        <div class="container-fluid">
        {{-- <div class="row "> --}}
        {{-- <h1>customer Info</h1> --}}

        {{-- </div> --}}

        {{-- <div class="row bg-dark">
            <div class="col"> --}}
                <div class="container" style="width:50%">

                    <div class="form-gruop">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" name="customer_email" value="{{old('customer_email')}}" id="" class="form-control">
                            <label for="customer_email" ><h6>CUSTOMER EMAIL</h6></label>
                            
                            @if (count($errors) > 0)
                                <div class="alert alert-info alert-dismissible fade show">
                                    <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                                    <strong>Wait! </strong>{{$errors->first('customer_email')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-gruop">
                        <div class="form-floating mb-3 mt-3">
                            <select name="payment_method" value="{{old('payment_method')}}" id="" class="form-select">
                                <option value=""></option>
                                <option value="cash">Cash</option>  
                                <option value="card">Card</option>
                                <option value="cheque">Cheque</option>
                                <option value="bkash">Bkash</option>
                            </select>
                            <label for="payment_method" class="form-label"><h6>PAYMENT METHOD</h6></label>
        
                            @if (count($errors) > 0)
                                <div class="alert alert-info alert-dismissible fade show">
                                    <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                                    <strong>Wait! </strong>{{$errors->first('payment_method')}}
                                </div>
                            @endif
                        </div>
                    </div>
        
                    <div class="form-gruop">
                        <div class="form-floating mb-3 mt-3">
                            <input type="date" name="date" value="{{old('date')}}" id="" class="form-control">
                            <label for="date"><h6>DATE</h6></label>
        
                            @if (count($errors) > 0)
                                <div class="alert alert-info alert-dismissible fade show">
                                    <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                                    <strong>Wait! </strong>{{$errors->first('date')}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            {{-- </div>
        </div> --}}
    </div>
        
             
            {{-- <table align= "center">
                <tr>
                    <th colspan="2"> CUSTOMER INFORMATION </th>
                </tr>
      
                <tr align= "left">
                    <th>CUSTOMER EMAIL:</th> 
                    <td><input type="text" name="customer_email" id=""> </td>
                </tr>

                <tr align= "left">
                    <th>PAYMENT METHOD:</th>
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
            </table> --}}
            
            <br>


{{-- test ? --}}
            {{-- <div class="container">
                <div class="row">
                    <div class="col">PRODUCTS</div>
                    <div class="col">QUANTITY</div>
                    <div class="col">PRICE</div>
                </div>
                
                @foreach ($products as $product)
                
                    <div class="row">
                        
                        @if ($product->available_quantity > 0)
                            <div class="col">
                                <input align="left" type="checkbox" id="{{$product->id}}" class="product-checkboxes" value="{{$product->id}}">
                                {{$product->name}} [{{$product->sku}}] {{$product->description}}
                            </div>

                            <div class="col">
                                <input type="number" placeholder="{{$product->available_quantity}}" id="quantity{{$product->id}}">
                            </div>

                            <div class="col">
                                <input type="number" placeholder="{{$product->selling_price}}   (P-{{$product->purchase_price}})" id="selling_price{{$product->id}}">
                            </div>
                        
                        @else
                            <div class="col text-danger">
                                {{$product->name}} [{{$product->sku}}] {{$product->description}}
                            </div>

                            <div class="col text-danger">
                                Not available!
                            </div>

                            <div class="col text-danger">
                                Not available!
                            </div>

                        @endif
                        
                    </div>
                @endforeach
            </div> --}}




            
{{-- test ? --}}


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
                        <div class="form-check">
                            {{-- <div class="form-floating mb-3 mt-3"> --}}
                                <input class="form-check-input product-checkboxes" name="name" value="{{old('name')}}" type="checkbox" id="{{$product->id}}" >
                                <label class="form-check-label" for="name">{{$product->name}} [{{$product->sku}}] {{$product->description}}</label>
                            {{-- </div> --}}
                        </div>

                        {{-- <input align="left" type="checkbox" id="{{$product->id}}" class="product-checkboxes" value="{{$product->id}}">
                        {{$product->name}} [{{$product->sku}}] {{$product->description}} --}}
                    </th>
                    
                    <td>
                        <div class="form-gruop">
                            <div class="form-floating">
                                <input type="number" name="quantity" value="{{old('quantity')}}" id="quantity{{$product->id}}" class="form-control">
                                <label for="quantity"><h6>QUANTITY  [{{$product->available_quantity}}]</h6></label>
            
                                @if (count($errors) > 0)
                                    <div class="alert alert-info alert-dismissible fade show">
                                        <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                                        <strong>Wait! </strong>{{$errors->first('quantity')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        {{-- <input type="number" placeholder="{{$product->available_quantity}}" id="quantity{{$product->id}}"> --}}
                    </td>  
                    
                    <td>
                        <div class="form-gruop">
                            <div class="form-floating">
                                <input type="number" name="selling_price" value="{{old('selling_price')}}" id="selling_price{{$product->id}}" class="form-control">
                                <label for="selling_price"><h6>PRICE  [{{$product->selling_price}}~{{$product->purchase_price}}]</h6></label>
            
                                @if (count($errors) > 0)
                                    <div class="alert alert-info alert-dismissible fade show">
                                        <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                                        <strong>Wait! </strong>{{$errors->first('selling_price')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- <input type="number" placeholder="{{$product->selling_price}}   (P-{{$product->purchase_price}})" id="selling_price{{$product->id}}"> --}}
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