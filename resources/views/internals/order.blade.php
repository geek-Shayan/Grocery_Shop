@extends('layouts.layout')

@section('styles')
    

@endsection

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
            /* grid-template-columns: 40% 60% ; */
            /* gap: 1em; */
        }
        .wrapper>div{   
            /* background-color: #56b379; */
            /* padding: 1em; */
        }

        .wrapper>div:nth-child(odd){
            background-color: rgb(209, 235, 207);
        }

        /* .wrapper>div:nth-child(even){
            background-color: rgb(222, 243, 247);
        } */


/*test HTML SNIPPET */
        /* form {
            width: 300px;
            margin: 0 auto;
            text-align: center;
            padding-top: 50px;
        } */

        .value-button {
            display: inline-block;
            border: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            /* height: 40px; */
            text-align: center;
            vertical-align: middle;
            padding: 11px 0;
            background: #eee;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .value-button:hover {
            cursor: pointer;
        }

        form #decrease {
            margin-right: -4px;
            border-radius: 8px 0 0 8px;
        }

        form #increase {
            margin-left: -4px;
            border-radius: 0 8px 8px 0;
        }

        form #input-wrap {
            margin: 0px;
            padding: 0px;
        }

        input#number {
            text-align: center;
            border: none;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            height: 40px;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
/*test HTML SNIPPET*/

    </style>
    
{{-- SLIDERS? --}}
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
{{-- SLIDERS? --}}

    <form align= "center" action={{ route('order.confirm') }} method="post" onsubmit="return processCart()" >
    @csrf

{{-- //////grids in the order list implement --}}
        {{-- <div class="wrapper">
            <div class="row">
                
                <div class="col">
                    <div> Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolore?</div>                </div>
                <div class="col">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quisquam ab consectetur voluptas culpa quos vitae nam quis distinctio consequatur!</div>
            </div>
            <div class="row">
                <div class="col">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolore?</div>
                <div class="col">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quisquam ab consectetur voluptas culpa quos vitae nam quis distinctio consequatur!</div>
                <div class="col">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolore?</div>
                <div class="col">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quisquam ab consectetur voluptas culpa quos vitae nam quis distinctio consequatur!</div>
                
            </div>
        </div> --}}
{{-- //////grids in the order list implement --}}


        <div class="container p-3" style="width:100%">
            
            <div class="row">
                
                <div class="col bg-dark">
                    <div class="container">
                        <h5><div class="text-light pt-2"> GRAND TOTAL</div></h5>
                        <h2><div class="text text-light bg-success" id="total"></div></h2>
                    </div>
                </div>

                <div class="col" style="background-color: rgba(166, 197, 226, 0.795)">
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
                </div>

                <div class="col" style="background-color: rgba(166, 197, 226, 0.795)">
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
                </div>

                <div class="col" style="background-color: rgba(166, 197, 226, 0.795)">
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
            </div>
        </div>

{{-- old        --}}
             
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

{{-- old        --}}

{{-- BOOTSTAP row col --}}

        <div class="container p-3 "  >
            <div class="wrapper ">
                <div class="row">
                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show ">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! Insufficient Data </strong>
                        </div>
                    @endif           
                </div>

                <div class="row d-flex justify-content-center p-2 bg-dark">
                    <div class="col-md-5 text-light fw-bold">PRODUCTS</div>
                    <div class="col-md-3 text-light fw-bold">QUANTITY</div>
                    <div class="col-md-3 text-light fw-bold">PRICE</div>
                    <div class="col-md-1 text-light fw-bold">TOTAL</div>
                    {{-- <div class="col fw-bold">W</div> --}}
                </div>

                @foreach ($products as $product)
                    <div class="row p-1 d-flex justify-content-center" onchange =" calculateTotal()">
                        @if ($product->available_quantity > 0)
                            <div class="col-md-5 fw-bold">
                                <div class="form-check form-switch">
                                    <input class="form-check-input product-checkboxes" name="name" value="{{old('name')}}" type="checkbox" id="{{$product->id}}" >
                                    <label class="form-check-label" for="name">{{$product->name}} [{{$product->sku}}] {{$product->description}}</label>
                                </div>
                            </div>

                            <div class="col-md-3 ">
                                <div class="form-group input-group">
                                    <label class="input-group-text fw-bold" for="quantity">Pcs</label>
                                    <input class="form-control" type="number" name="quantity" placeholder="quantity  [{{$product->available_quantity}}]" value="{{old('quantity')}}" id="quantity{{$product->id}}">
                                </div>
                            </div>

                            <div class="col-md-3 ">
                                <div class="form-group input-group">
                                    <label class="input-group-text fw-bold" for="selling_price">$</label>
                                    <input class="form-control" type="number" name="selling_price" placeholder="price [{{$product->selling_price}}~{{$product->purchase_price}}]" value="{{old('selling_price')}}" id="selling_price{{$product->id}}">
                                </div>
                            </div>

                            <div class="col-md-1 ">
                                <b><div class="text text-light bg-success " id="totalByProduct{{$product->id}}" ></div></b>
                            </div>

                        @else
                            <div class="col-md-5 text-danger fw-bold">
                                <div class="form-check form-switch">
                                    <input class="form-check-input product-checkboxes" name="name" value="{{old('name')}}" type="checkbox" id="" disabled>
                                    <label class="form-check-label" for="name">{{$product->name}} [{{$product->sku}}] {{$product->description}}</label>
                                </div>
                            </div>
                            <div class="col-md-3 p-2 text-danger ">Not available!</div>
                            <div class="col-md-3 p-2 text-danger ">Not available!</div>
                            <div class="col-md-1 p-2 text-danger ">Null!</div>
                        @endif

                    </div>
                @endforeach
            </div>
        </div>
{{-- BOOTSTAP row col --}}
            


{{-- TABLE WITH NEW FEATURES LIKE DYNAMIC TOTAL CALCULTION --}}

        <table align="center" >
            <tr>
                <th>PRODUCTS</th>
                <th>QUANTITY</th>
                <th>PRICE</th>
                <th>TOTAL</th>
                <th></th>
            </tr>

            @foreach ($products as $product)
            <tr onchange =" calculateTotal()">
                @if ($product->available_quantity > 0)
                <th >
                    <div class="form-check form-switch">
                        <input class="form-check-input product-checkboxes" name="name" value="{{old('name')}}" type="checkbox" id="{{$product->id}}" >
                        <label class="form-check-label" for="name">{{$product->name}} [{{$product->sku}}] {{$product->description}}</label>
                    </div>

                    {{-- <input align="left" type="checkbox" id="{{$product->id}}" class="product-checkboxes" value="{{$product->id}}">
                    {{$product->name}} [{{$product->sku}}] {{$product->description}} --}}
                </th>
                
                <td>
                    {{-- <div class="form-gruop">
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
                    </div> --}}

{{-- 333? --}}
                    <div class="form-group input-group">
                        <label class="input-group-text" for="quantity"><b>Pcs</b></label>
                        <input class="form-control" type="number" name="quantity" placeholder="quantity  [{{$product->available_quantity}}]" value="{{old('quantity')}}" id="quantity{{$product->id}}">
                    </div>

                    {{-- <div class="form-group input-group">
                        <div class="value-button btn btn-outline-danger " id="decrease{{$product->id}}" onclick="decreaseValue()" value="Decrease Value">-</div>
                        <input type="number" id="number" value="0" min="1" max="100">
                        <div class="value-button btn btn-outline-success " id="increase{{$product->id}}" onclick="increaseValue()" value="Increase Value">+</div>
                    </div> --}}

{{-- 333? --}}                        
                    
                    {{-- <input type="number" placeholder="{{$product->available_quantity}}" id="quantity{{$product->id}}"> --}}
                </td>  
                
                <td >
                    {{-- <div class="form-gruop">
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
                    </div> --}}

{{-- 333? --}}
                    <div class="form-group input-group">
                        <label class="input-group-text" for="selling_price"><b>$</b></label>
                        <input class="form-control" type="number" name="selling_price" placeholder="price [{{$product->selling_price}}~{{$product->purchase_price}}]" value="{{old('selling_price')}}" id="selling_price{{$product->id}}">
                    </div>
{{-- 333? --}}
                    {{-- <input type="number" placeholder="{{$product->selling_price}}   (P-{{$product->purchase_price}})" id="selling_price{{$product->id}}"> --}}
                </td> 
                <td>
                    {{-- DYNAMIC TOTAL CALC --}}
                        <b><div class="text text-light bg-success" id="totalByProduct{{$product->id}}" >--</div></b>
                        {{-- <div id="total{{$product->id}}"></div> --}}
                        {{-- <div id="total"></div> --}}
                </td>
                <td>
                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show ">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>
                        </div>
                    @endif
                </td>        


{{-- else state --}}
                @else
                <th>
                    <div class="form-check form-switch">
                        <input class="form-check-input product-checkboxes" name="name" value="{{old('name')}}" type="checkbox" id="" disabled>
                        <label class="form-check-label text-danger" for="name">{{$product->name}} [{{$product->sku}}] {{$product->description}}</label>
                    </div>

                </th>

                <td class="text-danger">Not available!</td>
                <td class="text-danger">Not available!</td>
                <td class="text-danger">Null!</td>
                <td></td>

                @endif

{{-- ORIGINAL FIRST LINES OF ORDERS --}}
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
                
{{-- ORIGINAL FIRST LINES OF ORDERS --}}
            </tr>
            @endforeach
        </table>
{{-- TABLE WITH NEW FEATURES LIKE DYNAMIC TOTAL CALCULTION --}}

        <input type="hidden" id="cart" name="cart">
        
        <br>
        <input class="btn btn-success" type="submit" value="Confirm">
    </form>

{{-- html SNIPPET EX --}}
    <form>
        <div class="value-button btn btn-outline-danger " id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
        <input type="number" id="number" value="0" min="1" max="100">
        <div class="value-button btn btn-outline-success " id="increase" onclick="increaseValue()" value="Increase Value">+</div>
    </form>

{{-- BOOTSTRAP SNIPPET EX --}}
        {{-- <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                <span class="glyphicon glyphicon-minus"></span>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div> --}}


@endsection


@section('javascripts')

    <script>
        function calculateTotal()
        {
            let total = 0;
            let product_checkboxes = document.getElementsByClassName("product-checkboxes");           

            for(let i=0; i<product_checkboxes.length; i++)
            {
                // console.log(product_checkboxes[i].checked);           
                if(product_checkboxes[i].checked)
                {   
                    let quantity = document.getElementById("quantity" + product_checkboxes[i].id).value;
                    let selling_price = document.getElementById("selling_price" + product_checkboxes[i].id).value;
                    
                    document.getElementById("totalByProduct" + product_checkboxes[i].id).innerHTML = quantity * selling_price;
                    
                    total += (quantity * selling_price);
                    // document.getElementById("total"+product_checkboxes[i].id).innerHTML = total;
                    document.getElementById("total").innerHTML = total;
                }
            }
            document.getElementById("total").innerHTML = total;

        }

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

        function increaseValue()
        {
            var value = parseInt(document.getElementById("number").value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById("number").value = value;
        }

        function decreaseValue()
        {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            document.getElementById('number').value = value;
        }

    </script>
    
@endsection


