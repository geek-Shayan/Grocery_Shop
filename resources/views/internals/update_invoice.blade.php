@extends('layouts.layout')

@section('content')

    <div class="container-fluid bg-success">
        <h3>UPDATE INVOICE</h3>    
    </div>

    <form style="text-align: center" action={{ route('invoices.update.save', $invoice->id ) }} method="post">
        {{@csrf_field()}}
        <div class="container" style="width:50%">
            <div class="form-gruop">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" name="customer_email" value="{{old('customer_email')}}" id="" class="form-control">
                    <label for="customer_email" ><h6>CUSTOMER EMAIL [   {{$invoice->customer_email}}  ]</h6></label>
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>{{$errors->first('customer_email')}}
                        </div>
                    @endif

                </div>
            </div>
            
            <div class="form-gruop">
                <div class="form-floating mb-3 mt-3">
                    <select name="payment_method" value="{{old('payment_method')}}" id="" class="form-select">
                        <option></option>
                        <option value="cash">Cash</option>  
                        <option value="card">Card</option>
                        <option value="cheque">Cheque</option>
                        <option value="bkash">Bkash</option>
                    </select>
                    <label for="payment_method" class="form-label"><h6>PAYMENT METHOD    [   {{$invoice->payment_method}}  ]</h6></label>

                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>{{$errors->first('payment_method')}}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-gruop">
                <div class="form-floating mb-3 mt-3">
                    <input type="date" name="date" value="{{old('date')}}" id="" class="form-control">
                    <label for="date"><h6>DATE    [   {{$invoice->date}}  ]</h6></label>

                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>{{$errors->first('date')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>  

            {{-- <tr>
                <td><input type="number" name="id" id=""> </td>
                <td><input type="number" name="invoice_number" id=""> </td>
                <td><input type="text" name="customer_email" id=""> </td>
                <td><input type="number" name="total" id=""> </td>
                <td><input type="text" name="payment_method" id=""> </td>
                <td><input type="date" name="date" id=""> </td>

            </tr> --}}
            
        <button type="submit" name="submit" class="btn btn-primary">Update Invoice</button>
    </form>

@endsection   