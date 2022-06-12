@extends('layout')

@section('content')
    <h1>UPDATE INVOICE</h1>
    
    <form align= "center" action="/invoices/update/{{$id}}" method="post">
        {{@csrf_field()}}


        <table align= "center">

            {{-- <tr>
                <th><h6>ID:</h6></th>
                <td><input type="number" name="id" id=""> </td>
            </tr> --}}
            {{-- <tr align= "left">
                <th>INVOICE NO.:</th>
                <td><input type="number" name="invoice_number" id=""> </td>
            </tr> --}}
            <tr align= "left">
                <th>CUSTOMER EMAIL:</th> 
                <td><input type="text" name="customer_email" id=""> </td>
            </tr>
            {{-- <tr align= "left">
                <th>TOTAL:</th>
                <td><input type="number" name="total" id=""> </td>
            </tr> --}}
            <tr align= "left">
                <th>PAYMENT METHOD:</th>
                <td><input type="text" name="payment_method" id=""> </td>
            </tr>
            <tr align= "left">
                <th>DATE:</th>
                <td><input type="date" name="date" id=""> </td>
            </tr>
                
        </table>
      
 
     
            {{-- <tr>
                <td><input type="number" name="id" id=""> </td>
                <td><input type="number" name="invoice_number" id=""> </td>
                <td><input type="text" name="customer_email" id=""> </td>
                <td><input type="number" name="total" id=""> </td>
                <td><input type="text" name="payment_method" id=""> </td>
                <td><input type="date" name="date" id=""> </td>

            </tr> --}}
        

        <br>
            
        <input type="submit" onclick="alert('Update Saved!')" value="Update">
    </form>

@endsection   