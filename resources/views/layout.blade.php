<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GROCERY SHOP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/products">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/invoices">Invoices</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/order">Order</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="/invoices/new">Order</a>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="/checkout">Checkout</a>
        </li> --}}
       
    </ul>

    <div class ="Container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html> 
