@extends('layouts.layout')

@section('content')

    <div class="container-fluid bg-success">
        <h3>NEW PRODUCT</h3>    
    </div>
    
    <form align= "center" action="/products/new/save" method="post" >
        {{@csrf_field()}}

        {{-- <div class="form-gruop">
            <label for="name">NAME</label>
            <input type="text" name="name" id="" class="form-control">

        </div>
        
        <div class="form-gruop">
            <label for="sku">SKU</label>
            <input type="text" name="sku" id="" class="form-control">

        </div> --}}

            <h6>NAME        :           <input type="text" name="name" id=""> <br></h6> 
            <h6>SKU         :           <input type="text" name="sku" id=""> <br></h6>
            <h6>DESCRIPTION :           <input type="text" name="description" id=""> <br></h6>
            <h6>AVAILABLE QUANTITY  :   <input type="number" name="available_quantity" id=""> <br></h6>
            <h6>PURCHASE PRICE     :    <input type="number" name="purchase_price" id=""> <br></h6>
            <h6>PROFIT RANGE  :         <input type="number" name="profit_range" id=""> <br></h6>
            {{-- <h6>SELLING PRICE     :     <input type="number" name="selling_price" id=""> <br></h6> --}}
            
            
            <br>
            {{-- onclick="alert('New Item Saved!')" --}}
            <input type="submit" name="submit"  value="Save New Item">
            <div class="alert alert-info alert-dismissible fade show" >
                <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Success!</strong> New Item Saved!
            </div>
        </form>


@endsection        