@extends('layouts.layout')

@section('content')
    <div class="container-fluid bg-success">
        <h3>RESTOCK PRODUCT</h3>    
    </div>
    <form style="text-align: center" action={{ route('products.restock.save',$product->id) }} method="post">
        {{@csrf_field()}}
        <div class="container" style="width:50%">
            
            {{-- <h6>PRODUCT ID :            <output name="id" >{{$product->id}}</output></h6> --}}
            <h6>NAME :                  <output name="name" >{{$product->name}}</output></h6>
            <h6>SKU :                   <output name="sku" >{{$product->sku}}</output></h6>
            <h6>DESCRIPTION :           <output name="description" >{{$product->description}}</output></h6>
            <h6>AVAILABLE QUANTITY :    <output name="available_quantity" >{{$product->available_quantity}}</output></h6>

            <img src="{{ asset('storage/app/images/'.$product->image) }}" alt="{{$product->name}}" title="{{$product->name}}" style="width:20%">
            
            <div class="form-gruop">
                <div class="form-floating mb-3 mt-3">
                    <input type="number" name="restock_quantity" value="{{old('restock_quantity')}}" id="" class="form-control">
                    <label for="restock_quantity"><h6>RESTOCK QUANTITY  [   {{$product->available_quantity}}  ]</h6></label>

                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>{{$errors->first('restock_quantity')}}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-gruop">
                <div class="form-floating mb-3 mt-3">
                    <input type="number" name="purchase_price" value="{{old('purchase_price')}}" id="" class="form-control">
                    <label for="purchase_price"><h6>PURCHASE PRICE  [   {{$product->purchase_price}}  ]</h6></label>

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
                    <label for="profit_range"><h6>PROFIT RANGE  [   {{$product->profit_range}}  ]</h6></label>

                    @if (count($errors) > 0)
                        <div class="alert alert-info alert-dismissible fade show">
                            <button type="button" for="submit" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Wait! </strong>{{$errors->first('profit_range')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Restock Item</button>
    </form>


@endsection   