@extends('layouts.layout')



@section('content')

    <div class="container-fluid bg-success">
        <h3>VIEW PRODUCT</h3>    
    </div>

    <div class="container" style="text-align: center" >
     
        <a href={{ route('products.view.pdf', $product->id ) }} class="btn btn-primary">View PDF</a>
        <a href={{ route('products.view.pdf.download', $product->id ) }} class="btn btn-primary">Download PDF</a>
        <a href={{ route('products.view.pdf.email', $product->id ) }} class="btn btn-primary">Email PDF</a>

        <a href="" class="btn btn-primary">Download IMAGE</a>

        <a href={{ route('products.restock', $product->id ) }} class="btn btn-success">Restock</a>
        <a href={{ route('products.update', $product->id ) }} class="btn btn-warning">Update</a>
        <a href={{ route('products.delete', $product->id ) }} class="btn btn-danger" onclick="alert('Product Deleted !')" >Delete</a>
    </div>
    
    <br>
    
    <div class="container" style="text-align: center" style="width:50%">
        <h6>PRODUCT ID :            <output name="id" >{{$product->id}}</output></h6>
        <h6>NAME :                  <output name="name" >{{$product->name}}</output></h6>
        <h6>SKU :                   <output name="sku" >{{$product->sku}}</output></h6>
        <h6>DESCRIPTION :           <output name="description" >{{$product->description}}</output></h6>
        <h6>AVAILABLE QUANTITY :    <output name="available_quantity" >{{$product->available_quantity}} Pcs</output></h6>
        <h6>PURCHASE PRICE :        <output name="purchase_price" >{{$product->purchase_price}} Tk</output></h6>
        <h6>PROFIT RANGE :          <output name="profit_range" >{{$product->profit_range}} Tk</output></h6>
        <h6>SELLING PRICE :         <output name="selling_price" >{{$product->selling_price}} Tk</output></h6>

        <img src="{{ asset('storage/app/images/'.$product->image) }}" alt="{{$product->name}}" title="{{$product->name}}" style="width:20%">
    
    </div>


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


@endsection