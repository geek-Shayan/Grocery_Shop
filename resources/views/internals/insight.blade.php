@extends('layouts.layout')

@section('content')

    <div class="container-fluid bg-success" >
        <h3>INSIGHT</h3>
    </div>


    <h6> gross profit</h6>
    <h6>profit by month</h6>
    <h6>inventory</h6>



    <div class="container">
        <select class="form-select">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>



        <label for="browser" class="form-label">Choose your browser from the list:</label>
        <input class="form-control" list="browsers" name="browser" id="browser">
        <datalist id="browsers">
            <option value="Edge">
            <option value="Firefox">
            <option value="Chrome">
            <option value="Opera">
            <option value="Safari">
        </datalist>





    </div>
    
@endsection