@extends('layouts.layout')

@section('styles')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css"> --}}

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.css"/>
    
@endsection

@section('content')

    <div class="container-fluid bg-success">
        <h3>INVOICES</h3>    
    </div>

    <div class="container-fluid">
        <table id ="datatable" class="table table-dark table-striped table-hover ">

            <thead>
                <tr>
                    <th >SL NO.</th>
                    {{-- <th >ID</th> --}}
                    <th >INVOICE NO.</th>
                    <th >CUSTOMER EMAIL</th>
                    <th >PROFIT</th>
                    <th >TOTAL</th>
                    <th >PAYMENT METHOD</th>
                    <th >DATE</th>
                    <th >VIEW</th>
                    <th >UPDATE</th>
                    <th >DELETE</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $sl = 0;
                    $profit = 0;
                @endphp

                @foreach ($invoices as $invoice)
                    @php
                        // $profit = 
                    @endphp
                    <tr>
                        <td align= "center">{{++$sl}}</td>
                        {{-- <td align= "center">{{$invoice->id}}</td> --}}
                        <td align= "center">{{$invoice->invoice_number}}</td>
                        <td align= "left">{{$invoice->customer_email}}</td>

                        @if ($invoice->profit > 0)
                            <td align= "left" class="text-info">Tk {{$invoice->profit}}</td>
                        @else
                            <td align= "left" class="text-warning">Tk {{$invoice->profit}}</td>
                        @endif
                        
                        <td align= "left">Tk {{$invoice->total}}</td>
                        <td align= "center">{{$invoice->payment_method}}</td>
                        <td align= "left">{{$invoice->date}}</td>
                        {{-- <td>UPDATE</td>
                        <td>DELETE</td> --}}
                        
                        {{-- "/invoices/view/{{$invoice->id}}" --}}
                        <td><a href={{ route('invoices.view', $invoice->id ) }} class="btn btn-sm btn-success">View</a></td>
                        {{-- "/invoices/update/{{$invoice->id}}" --}}
                        <td><a href={{ route('invoices.update', $invoice->id ) }} class="btn btn-sm btn-primary">Update</a></td>
                        {{-- "/invoices/delete/{{$invoice->id}}" --}}
                        <td><a href={{ route('invoices.delete', $invoice->id ) }} class="btn btn-sm btn-danger" onclick="alert('Invoice Deleted !')">Delete</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('javascripts')

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.js"></script>


    <script>
        $(document).ready( function () {
        $('#datatable').DataTable({
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
                //         targets: -1,
                //         visible: false
                //     } 
                // ]
            });
        } );
    </script>
    
@endsection
