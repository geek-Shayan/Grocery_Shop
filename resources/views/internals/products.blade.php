@extends('layout')

@section('content')


    <h1>PRODUCTS</h1>

    <form align= "center" action="/products/new" method="post">
        {{@csrf_field()}}
            <input type="submit" value="New Item">
            {{-- <input type="button" onclick="alert('Hello World!')" value="Click Me!"> --}}

            {{-- <input type="submit" value="refresh"> --}}
    </form>

    <table  align= "center">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>SKU</th>
            <th>DESCRIPTION</th>
            <th>AVAILABLE_QUANTITY</th>
            <th>PURCHASE_PRICE</th>
            <th>UPDATE</th>
            <th>DELETE</th>
            

        </tr>

        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->sku}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->available_quantity}}</td>
            <td>{{$product->purchase_price}}</td>
            <td>UPDATE</td>
            <td>DELETE</td>
            {{-- <td><a href="/update/{{$student->id}}">update</a></td>
            <td><a href="/students/delete/{{$student->id}}">delete</a></td> --}}

        </tr>
        @endforeach
        
    </table>

@endsection