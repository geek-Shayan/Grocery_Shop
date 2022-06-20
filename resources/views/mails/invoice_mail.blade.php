{{-- @component('mail')
    #new invoice
@endcomponent --}}

{{-- <h1>hii invoice created </h1> --}}

{{-- @extends('layout') --}}

{{-- @section('content') --}}

<h1>Invoice</h1>

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

        tr:nth-child(1) {
          background-color: #35947f;
        }
    </style>

    <h4>CUSTOMER INFORMATION</h4>
    <h4>INVOICE ID :        <output name="id" >{{$invoice->id}}</output></h4>
    <h4>INVOICE NUMBER :    <output name="invoice_number" >{{$invoice->invoice_number}}</output></h4>
    <h4>CUSTOMER EMAIL :    <output name="customer_email" >{{$invoice->customer_email}}</output></h4>
    <h4>DATE :              <output name="date" >{{$invoice->date}}</output></h4>
    <h4>PAYMENT METHOD :    <output name="payment_method" >{{$invoice->payment_method}}</output></h4>
    <h4>GRAND TOTAL :       <output name="total" >{{$invoice->total}}</output></h4>


    <table align="center">
        <tr>
            <th colspan="7"> ORDER LIST </th>
        </tr>
        
        <tr>
            <th>SL NO.</th>
            <th>SKU</th>
            <th>PRODUCTS</th>
            <th>DESCRIPTION</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>TOTAL</th>
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
