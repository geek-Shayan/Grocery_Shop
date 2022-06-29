@extends('layouts.layout')

@section('content')

    <div class="container-fluid bg-success" >
        <h3>CHECKLIST</h3>
    </div>

    <style>
        .wrapper{
            display: grid;
            /* grid-auto-columns:100px; */
            grid-template-columns: 33% 33% 34% ;
            gap: 1em;
        }
        .wrapper>div{   
            background-color: #56b379;
            padding: 1em;
        }

        .wrapper>div:nth-child(odd){
            background-color: rgb(190, 199, 108);
        }
    </style>



        <div class="container">
            <div class="row">
                <div class="col">
                    <h6 class="text-danger">gross profit</h6>
                    <h6 class="text-danger">can't sell more than the inventory</h6>
                    <h6 class="text-danger">Order page bootstrp [[[partial done]]]</h6>
                    <h6 class="text-danger">all view, pdf page bootstrp</h6>
                    <h6 class="text-danger">profit by month</h6>
                    <h6 class="text-danger">graph</h6>
                    <h6 class="text-danger">events and listeners </h6>
                    <h6 class="text-danger">image download</h6>
                    <h6 class="text-danger">admin authentication </h6>
                    <h6 class="text-danger">order quntity in slider (https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_input_type_range)</h6>
                    <h6 class="text-danger">javascripts</h6>
                </div>
                <div class="col">
                    <h6 class="text-success">pdf of product view</h6>
                    <h6 class="text-success">pdf of product download</h6>
                    <h6 class="text-success">profit in invoice</h6>
                    <h6 class="text-success">inventory management in db</h6>
                    <h6 class="text-success">inventory restock</h6>
                    <h6 class="text-success">pdf of invoice view</h6>
                    <h6 class="text-success">pdf of invoice download</h6>
                    <h6 class="text-success">email of invoice view</h6>
                    <h6 class="text-success">email of invoice pdf attachment</h6>
                    <h6 class="text-success">image upload</h6>
                    <h6 class="text-success">image view</h6>
                </div>
            </div>
        </div>
        
        
        {{-- <div class="container">
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
    </div> --}}
    
    <div class="wrapper">
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolore?</div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quisquam ab consectetur voluptas culpa quos vitae nam quis distinctio consequatur!</div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolore?</div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quisquam ab consectetur voluptas culpa quos vitae nam quis distinctio consequatur!</div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolore?</div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quisquam ab consectetur voluptas culpa quos vitae nam quis distinctio consequatur!</div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolore?</div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quisquam ab consectetur voluptas culpa quos vitae nam quis distinctio consequatur!</div>
        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolore?</div>
    </div>
    
    @endsection