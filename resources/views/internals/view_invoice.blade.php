@extends('layout')


@section('content')
    <h1>VIEW</h1>

    <style>
        table {
          border-collapse: collapse;
          width: 80%;
        }
        
        th, td {
          text-align: center;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #D6EEEE;
        }
    </style>

        {{-- <form align= "center" action={{ route('order.confirm') }} method="post" > --}}
            {{-- onsubmit="return processCart()" --}}
        {{-- @csrf --}}

        {{-- <table>
            <tr></tr>


        </table> --}}

        <h6>INVOICE ID :        <output name="id" >{{$invoice->id}}</output></h6>
        <h6>INVOICE NUMBER :    <output name="invoice_number" >{{$invoice->invoice_number}}</output></h6>
        <h6>CUSTOMER EMAIL :    <output name="customer_email" >{{$invoice->customer_email}}</output></h6>
        <h6>DATE :              <output name="date" >{{$invoice->date}}</output></h6>
        <h6>PAYMENT METHOD :    <output name="payment_method" >{{$invoice->payment_method}}</output></h6>
        <h6>GRAND TOTAL :       <output name="total" >{{$invoice->total}}</output></h6>

        
            {{-- <form oninput="x.value=parseInt(a.value)">
            <input type="range" id="a" value="50"> --}}
            {{-- +<input type="number" id="b" value="25"> --}}
            {{-- =<output name="x" for="a "></output>
            </form> --}}


            <table align="center">
                <tr>
                    <th>
                        SERIAL NO.
                    </th>

                    <th>
                        SKU
                    </th>

                    <th>
                        PRODUCTS
                    </th>

                    <th>
                        DESCRIPTION
                    </th>

                    <th>
                        QUANTITY
                    </th>

                    <th>
                        PRICE
                    </th>

                    <th>
                        TOTAL
                    </th>
                </tr>



                @php
                    $sl = 0;
                @endphp

                @foreach ($sold_items as $sold_item)

                    <tr align="left">
                        <th >
                            <output name="sl" >{{++$sl}}</output>
                        </th>

                        <th >
                            <output name="sku" >{{$sold_item->sku}}</output>
                        </th>
                        
                        <th >
                            <output name="name" >{{$sold_item->name}}</output>
                        </th>

                        <th >
                            <output name="description" >{{$sold_item->description}}</output>
                        </th>

                        <th >
                            <output name="quantity" >{{$sold_item->quantity}}</output>
                        </th>
                        
                        <th>
                            <output name="selling_price" >{{$sold_item->selling_price}}</output>
                        </th>

                        @php
                            $total_as_product= $sold_item->selling_price * $sold_item->quantity;
                        @endphp

                        <th>
                            <output name="total" >{{$total_as_product}}</output>
                        </th>

                    </tr>

                @endforeach

                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>GRAND TOTAL</th>
                        <th><output name="total" >{{$invoice->total}}</output></th>
                    </tr>
            
            
            </table>

        {{-- </form> --}}

@endsection