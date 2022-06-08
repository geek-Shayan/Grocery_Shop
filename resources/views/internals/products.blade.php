@extends('layout')

@section('content')


    <h1>PRODUCTS</h1>

    <form align= "center" action="/products/new" method="post">
        {{@csrf_field()}}
            <input type="submit" value="New Item">
            {{-- <input type="button" onclick="alert('Hello World!')" value="Click Me!"> --}}

            {{-- <input type="submit" value="refresh"> --}}
    </form>

    <table align= "center">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>SKU</th>
            <th>DESCRIPTION</th>
            <th>AVAILABLE QUANTITY</th>
            <th>PURCHASE PRICE</th>
            <th>UPDATE</th>
            <th>DELETE</th>
            

        </tr>

        @foreach ($products as $product)
        <tr>
            <td align= "center">{{$product->id}}</td>
            <td align= "center">{{$product->name}}</td>
            <td align= "center">{{$product->sku}}</td>
            <td align= "center">{{$product->description}}</td>
            <td align= "center">{{$product->available_quantity}}</td>
            <td align= "center">{{$product->purchase_price}}</td>
            {{-- <td>UPDATE</td>
            <td>DELETE</td> --}}
            <td><a href="/products/update/{{$product->id}}">update</a></td>
            <td><a href="/products/delete/{{$product->id}}">delete</a></td>

        </tr>
        @endforeach
        
    </table>

@endsection