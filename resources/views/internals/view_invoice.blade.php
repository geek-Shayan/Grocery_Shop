@extends('layouts.layout')


@section('content')

    <div class="container-fluid bg-success">
        <h3>VIEW</h3>    
    </div>

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


    <h6>INVOICE ID :        <output name="id" >{{$invoice->id}}</output></h6>
    <h6>INVOICE NUMBER :    <output name="invoice_number" >{{$invoice->invoice_number}}</output></h6>
    <h6>CUSTOMER EMAIL :    <output name="customer_email" >{{$invoice->customer_email}}</output></h6>
    <h6>DATE :              <output name="date" >{{$invoice->date}}</output></h6>
    <h6>PAYMENT METHOD :    <output name="payment_method" >{{$invoice->payment_method}}</output></h6>
    <h6>GRAND TOTAL :       <output name="total" >{{$invoice->total}}</output></h6>


    <table align="center">
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
    
    </table>

    <br>
    <br>
 
    <div class="container" align="center">
         
        {{-- "/invoices/view/pdf/{{$invoice->id}}" --}}
        <a href={{ route('invoices.view.pdf', $invoice->id ) }} class="btn btn-primary">View PDF</a>
        {{-- "/invoices/view/pdf/download/{{$invoice->id}}" --}}
        <a href={{ route('invoices.view.pdf.download', $invoice->id ) }} class="btn btn-primary">Download PDF</a>
        {{-- "/invoices/view/pdf/email/{{$invoice->id}}" --}}
        <a href={{ route('invoices.view.pdf.email', $invoice->id ) }} class="btn btn-primary">Email PDF</a>
    </div>



@endsection