@extends('layouts.layout')



@section('content')

    <div class="container-fluid bg-success">
        <h3>VIEW view_product</h3>    
    </div>

    {{-- <style>
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
    </style> --}}


    <h6>PRODUCT ID :        <output name="id" >{{$product->id}}</output></h6>
    <h6>NAME :    <output name="name" >{{$product->name}}</output></h6>
    <h6>SKU :    <output name="sku" >{{$product->sku}}</output></h6>
    <h6>DESCRIPTION :              <output name="description" >{{$product->description}}</output></h6>
    <h6>AVAILABLE QUANTITY :    <output name="available_quantity" >{{$product->available_quantity}}</output></h6>


    <img src="{{ asset('storage/app/images/'.$product->image) }}" alt="" title="">




    {{-- <table align="center">
        <tr>
            <th>SERIAL NO.</th>
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
    
    </table> --}}

    <br>
    <br>
 
    {{-- <div class="container" align="center">
         

        <a href={{ route('invoices.view.pdf', $invoice->id ) }} class="btn btn-primary">View PDF</a>

        <a href={{ route('invoices.view.pdf.download', $invoice->id ) }} class="btn btn-primary">Download PDF</a>

        <a href={{ route('invoices.view.pdf.email', $invoice->id ) }} class="btn btn-primary">Email PDF</a>
    </div> --}}



@endsection