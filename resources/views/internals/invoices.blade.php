@extends('layout')

@section('content')
    
    <h1>INVOICES</h1>    

    {{-- <form align= "center" action="/products/new" method="post">
        {{@csrf_field()}}
            <input type="submit" value="New Item">
            {{-- <input type="button" onclick="alert('Hello World!')" value="Click Me!"> --}}

            {{-- <input type="submit" value="refresh"> --}}
    </form> --}}

    <table  align= "center">
        <tr>
            <th>ID</th>
            <th>INVOICE NO.</th>
            <th>CUSTOMER EMAIL</th>
            <th>TOTAL</th>
            <th>PAYMENT METHOD</th>
            <th>DATE</th>
            <th>UPDATE</th>
            <th>DELETE</th>
            

        </tr>

        @foreach ($invoices as $invoice)
        <tr>
            <td>{{$invoice->id}}</td>
            <td>{{$invoice->invoice_number}}</td>
            <td>{{$invoice->customer_email}}</td>
            <td>{{$invoice->total}}</td>
            <td>{{$invoice->payment_method}}</td>
            <td>{{$invoice->date}}</td>
            <td>UPDATE</td>
            <td>DELETE</td>
            {{-- <td><a href="/update/{{$student->id}}">update</a></td>
            <td><a href="/students/delete/{{$student->id}}">delete</a></td> --}}

        </tr>
        @endforeach
        
    </table>

@endsection
