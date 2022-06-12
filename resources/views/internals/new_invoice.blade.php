@extends('layout')

@section('content')
    <h1>NEW INVOICE</h1>
    
    <form align= "center" action="/invoices/new/save/" method="post">

        
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

            {{-- <h6>id:         <input type="number" name="id" id=""> <br></h6>
            <h6>INVOICE NO.     :       <input type="number" name="invoice_number" id=""> <br></h6>
            <h6>CUSTOMER EMAIL  :       <input type="text" name="customer_email" id=""> <br></h6> 
            <h6>TOTAL           :       <input type="number" name="total" id=""> <br></h6>
            <h6>PAYMENT METHOD  :       <input type="text" name="payment_method" id=""> <br></h6>
            <h6>DATE            :       <input type="date" name="date" id=""> <br></h6> --}}

            <br>
            
            <input type="submit" onclick="alert('New Invoice Saved!')" value="Save New Invoice">
        </form>

@endsection   