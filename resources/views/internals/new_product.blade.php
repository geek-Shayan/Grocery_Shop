@extends('layouts.layout')

@section('content')

    <div class="container-fluid bg-success">
        <h3>NEW PRODUCT</h3>    
    </div>
    
    <form style="text-align: center" action={{ route('products.new.save') }} method="post" enctype="multipart/form-data">
        @csrf
        <div class="container" style="width:50%">
            <div class="form-gruop">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" name="name" value="{{old('name')}}" id="" class="form-control">
                    <label for="name"><h6>NAME</h6></label>
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>{{$errors->first('name')}}
                        </div>
                    @endif

                </div>
            </div>
            
            <div class="form-gruop">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" name="sku" value="{{old('sku')}}" id="" class="form-control">
                    <label for="sku"><h6>SKU</h6></label>

                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>{{$errors->first('sku')}}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-gruop">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" name="description" value="{{old('description')}}" id="" class="form-control">
                    <label for="description"><h6>DESCRIPTION</h6></label>

                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>{{$errors->first('description')}}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-gruop">
                <div class="form-floating mb-3 mt-3">
                    <input type="number" name="available_quantity" value="{{old('available_quantity')}}" id="" class="form-control">
                    <label for="available_quantity"><h6>AVAILABLE QUANTITY</h6></label>

                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>{{$errors->first('available_quantity')}}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-gruop">
                <div class="form-floating mb-3 mt-3">
                    <input type="number" name="purchase_price" value="{{old('purchase_price')}}" id="" class="form-control">
                    <label for="purchase_price"><h6>PURCHASE PRICE</h6></label>

                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>{{$errors->first('purchase_price')}}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-gruop">
                <div class="form-floating mb-3 mt-3">
                    <input type="number" name="profit_range" value="{{old('profit_range')}}" id="" class="form-control">
                    <label for="profit_range"><h6>PROFIT RANGE</h6></label>

                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>{{$errors->first('profit_range')}}
                        </div>
                    @endif
                </div>
            </div>       

            <div class="form-gruop">
                <div class="form-floating mb-3 mt-3">
                    <input type="file" name="image"  id="" class="form-control">
                    <label for="image"><h6>UPLOAD IMAGE</h6></label>

                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>{{$errors->first('image')}}
                        </div>
                    @endif
                </div>
            </div> 
            
            {{-- onclick="alert('New Item Saved!')" --}}
            <button type="submit" name="submit" class="btn btn-primary">Save New Item</button>
            
            {{-- <div class="spinner-border text-info"> </div> --}}
        
            {{-- <div class="alert alert-info alert-dismissible fade show" >
                <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Success!</strong> New Item Saved!
                <strong>empty!</strong> New Item Empty!
            </div> --}}
        </div>
    </form>


@endsection        