@extends('layouts.layout')


@section('content')

    {{-- <div class="container- bg-success"> --}}

        <div class="container-fluid bg-success">
            <h3>HOME</h3>    
        </div>

        @include('layouts.home_carousel')

        {{-- <br>
        <h1 align="center">GROCERY SHOP</h1> 
        <br>
        <h3 align="center"><a href="/order">ORDER NOW !</a></h3> --}}
        
    {{-- </div> --}}

@endsection