@extends('layouts.layout')

@section('styles')
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.css"/>
    
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/r-2.3.0/sc-2.0.7/sl-1.4.0/datatables.min.css"/> --}}

@endsection
    

@section('content')

    <div class="container-fluid bg-success">
        <h3>PRODUCTS</h3>
    </div>
        
    <div class="container-fluid">
        <form align="center" action={{ route('products.new') }} method="post">
            {{@csrf_field()}}
            <div class="container" style="width: 30%">
                <div class="d-grid" >
                    <button type="submit" class="btn btn-lg btn-block btn-dark"><b>New Item</b></button>
                </div>
            </div>
        </form>
    </div>

    <div class="container-fluid ">
        <table id = "datatable" class="table table-striped table-dark table-hover " >
            <thead>
                <tr>
                    <th>SL NO.</th>
                    <th>IMAGE</th>
                    <th>NAME</th>
                    <th>SKU</th>
                    <th>DESCRIPTION</th>
                    <th>AVAILABLE QUANTITY</th>
                    <th>PURCHASE PRICE</th>
                    <th>PROFIT RANGE</th>
                    <th>SELLING PRICE</th>
                    <th>VIEW</th>
                    <th>RESTOCK</th>
                    <th>UPDATE</th>
                    <th>DELETE</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $sl = 0;
                    $total_product = 0;
                    $total_purchase_price = 0;
                    $total_profit_range = 0;
                    $total_seling_price = 0;
                @endphp

                @foreach ($products as $product)
                    {{-- @php
                        $total_product = $total_product+1;
                        $total_purchase_price = $product->purchase_price* $product->available_quantity;
                        $total_profit_range = $product->profit_range* $product->available_quantity;
                        $total_seling_price = $product->selling_price* $product->available_quantity;
                    @endphp --}}
                    <tr>
                        <td align= "center">{{++$sl}}</td>
                        
                        <td><img src="{{ asset('storage/app/images/'.$product->image) }}" alt="{{$product->sku}}" title="{{$product->name}}" height="30px" width="30px"></td>
                        
                        <td align= "left">{{$product->name}}</td>
                        <td align= "left">{{$product->sku}}</td>
                        <td align= "left">{{$product->description}}</td>
                        
                        @if ($product->available_quantity > 0)
                            <td class="text-info" >{{$product->available_quantity}} pcs</td>   
                        @else
                            <td class="text-warning">Not available!</td>
                        @endif

                        <td align= "left">Tk {{$product->purchase_price}} </td>
                        <td align= "left">Tk {{$product->profit_range}} </td>
                        <td align= "left">Tk {{$product->selling_price}} </td>
                        
                        <td><a href={{ route('products.view', $product->id ) }} class="btn btn-sm btn-success">View</a></td>
                        <td><a href={{ route('products.restock', $product->id ) }} class="btn btn-sm btn-outline-warning">Restock</a></td>
                        <td><a href={{ route('products.update', $product->id ) }} class="btn btn-sm btn-primary">Update</a></td>
                        <td><a href={{ route('products.delete', $product->id ) }} class="btn btn-sm btn-danger" onclick="alert('Product Deleted !')" >Delete</a></td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                {{-- <tr>
                    <th> TOTAL</th>
                    <th>{{$total_product}}</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>TPP {{$total_purchase_price}}</th>
                    <th>TPR {{$total_profit_range}}</th>
                    <th>TSP {{$total_seling_price}}</th>
                    <th></th>
                    <th></th>
                </tr> --}}
            </tfoot>

        </table>
    </div>
    
@endsection
    
@section('javascripts')
    

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.js"></script>
    
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/r-2.3.0/sc-2.0.7/sl-1.4.0/datatables.min.js"></script> --}}
    


    <script>
        // $(document).ready( function () {
        // $('#datatable').DataTable();
        // } );
        
        $(document).ready(function() {
        $('#datatable').DataTable( 
            {
                dom: 'Bfrtip',
                buttons: 
                [
                    // 'copy', 'csv', 'excel', 'pdf', 'print'
                    {
                        extend: 'print',
                        exportOptions: 
                        {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'copy',
                        exportOptions: 
                        {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'csv',
                        exportOptions: 
                        {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'excel',
                        exportOptions: 
                        {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'pdf',
                        exportOptions: 
                        {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],

                // MAKE COLUMNs INVISIBLE BY DEFULT 
                // columnDefs: 
                // [ 
                //     {
                //         targets: -12, // image -12
                //         visible: false
                //     } 
                // ]
    
            } );
        } );        

    </script>
@endsection