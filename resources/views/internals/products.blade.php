@extends('layout')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    
@endsection


@section('content')


    <h1>PRODUCTS</h1>
{{-- {{ route('routeName') }} --}}
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

    <table align= "center" id = "datatable">
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
            @endphp

            @foreach ($products as $product)
            <tr>
                <td>{{++$sl}}</td>
                {{-- <td align= "center">{{$product->id}}</td> --}}
                <td align= "center">{{$product->name}}</td>
                <td align= "center">{{$product->sku}}</td>
                <td align= "center">{{$product->description}}</td>
                <td align= "center">{{$product->available_quantity}}</td>
                <td align= "center">{{$product->purchase_price}}</td>
                <td align= "center">{{$product->profit_range}}%</td>
                <td align= "center">{{$product->selling_price}}</td>
                {{-- <td>UPDATE</td>
                <td>DELETE</td> --}}
                <td><a href="/products/update/{{$product->id}}">update</a></td>
                <td><a href="/products/delete/{{$product->id}}">delete</a></td>

            </tr>
            @endforeach
            
        </tbody>
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