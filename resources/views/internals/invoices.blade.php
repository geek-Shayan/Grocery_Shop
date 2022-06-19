@extends('layout')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    
@endsection

@section('content')
    
    <h1>INVOICES</h1>    

    {{-- <form align= "center" action="/invoices" method="post">
        {{@csrf_field()}}
            <input type="submit" value="New Item">
           
            {{-- <input type="button" onclick="alert('Hello World!')" value="Click Me!"> --}}

            {{-- <input type="submit" value="refresh">
    </form>  --}} 

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

    <table id ="datatable">

        <thead>
            <tr>
                <th align= "center">SL NO.</th>
                {{-- <th align= "center">ID</th> --}}
                <th align= "center">INVOICE NO.</th>
                <th align= "center">CUSTOMER EMAIL</th>
                <th align= "center">TOTAL</th>
                <th align= "center">PAYMENT METHOD</th>
                <th align= "center">DATE</th>
                <th align= "center">VIEW</th>
                <th align= "center">UPDATE</th>
                <th align= "center">DELETE</th>
            
            </tr>
        
        </thead>

        <tbody>
            @php
            $sl = 0;
            @endphp

            @foreach ($invoices as $invoice)
            <tr>
                <td align= "center">{{++$sl}}</td>
                {{-- <td align= "center">{{$invoice->id}}</td> --}}
                <td align= "center">{{$invoice->invoice_number}}</td>
                <td align= "center">{{$invoice->customer_email}}</td>
                <td align= "center">{{$invoice->total}}</td>
                <td align= "center">{{$invoice->payment_method}}</td>
                <td align= "center">{{$invoice->date}}</td>
                {{-- <td>UPDATE</td>
                <td>DELETE</td> --}}
                <td><a href="/invoices/view/{{$invoice->id}}">view</a></td>
                <td><a href="/invoices/update/{{$invoice->id}}">update</a></td>
                <td><a href="/invoices/delete/{{$invoice->id}}">delete</a></td>

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
