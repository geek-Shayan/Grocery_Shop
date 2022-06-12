@extends('layout')

@section('content')
    
    <h1>INVOICES</h1>    

    {{-- <form align= "center" action="/invoices" method="post">
        {{@csrf_field()}}
            <input type="submit" value="New Item">
           
            {{-- <input type="button" onclick="alert('Hello World!')" value="Click Me!"> --}}

            {{-- <input type="submit" value="refresh">
    </form>  --}} 

    <style>
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
        </style>

    <table>
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
    </table>

@endsection
