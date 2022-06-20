@extends('layout')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    
@endsection


@section('content')


    <h1>PRODUCTS</h1>

    <form align= "center" action="/products/new" method="post">
        {{@csrf_field()}}
            <input type="submit" value="New Item">
            {{-- <input type="button" onclick="alert('Hello World!')" value="Click Me!"> --}}

            {{-- <input type="submit" value="refresh"> --}}
    </form>

    {{-- <style>
        table {
          border-collapse: collapse;
          width: 100%;
        }
        
        th, td {
          text-align: center;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #D6EEEE;
        }
    </style> --}}

    <table id = "datatable">
        <thead>
            <tr>
                <th>SL NO.</th>
                {{-- <th>ID</th> --}}
                <th>NAME</th>
                <th>SKU</th>
                <th>DESCRIPTION</th>
                <th>AVAILABLE QUANTITY</th>
                <th>PURCHASE PRICE</th>
                <th>PROFIT RANGE</th>
                <th>SELLING PRICE</th>
                <th>UPDATE</th>
                <th>DELETE</th>
            </tr>
        </thead>

        <tbody>
            @php
                $sl = 0;
                $total_product = 0;
                $total_purchase_price = 0;
                $total_profit_range = 0;
                $total_seling_price = 0;
            @endphp

            @foreach ($products as $product)
            {{-- @php
                $total_product = $total_product+1;
                $total_purchase_price = $product->purchase_price* $product->available_quantity;
                $total_profit_range = $product->profit_range* $product->available_quantity;
                $total_seling_price = $product->selling_price* $product->available_quantity;
            @endphp --}}
            <tr>
                <td align= "center">{{++$sl}}</td>
                {{-- <td align= "center">{{$product->id}}</td> --}}
                <td align= "left">{{$product->name}}</td>
                <td align= "left">{{$product->sku}}</td>
                <td align= "left">{{$product->description}}</td>
                <td align= "left">{{$product->available_quantity}} pcs</td>
                <td align= "left">Tk {{$product->purchase_price}} </td>
                <td align= "left">Tk {{$product->profit_range}} </td>
                <td align= "left">Tk {{$product->selling_price}} </td>
                {{-- <td>UPDATE</td>
                <td>DELETE</td> --}}
                <td><a href="/products/update/{{$product->id}}">update</a></td>
                <td><a  href="/products/delete/{{$product->id}}" onclick="alert('Product Deleted !')" >delete</a></td>

            </tr>
            @endforeach
        </tbody>

        
        <tfoot>
            
            {{-- <tr>
                <th> TOTAL</th>
                <th>{{$total_product}}</th>
                <th></th>
                <th></th>
                <th></th>
                <th>TPP {{$total_purchase_price}}</th>
                <th>TPR {{$total_profit_range}}</th>
                <th>TSP {{$total_seling_price}}</th>
                <th></th>
                <th></th>
            </tr> --}}
        </tfoot>

    </table>

@endsection

@section('javascripts')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
        $('#datatable').DataTable();
        } );
    </script>
    
@endsection