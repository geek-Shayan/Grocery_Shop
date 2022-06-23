

<nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
    
    <div class="container-fluid">
        
        <a class="navbar-brand text-success" href="/"><h1>GROCERY SHOP</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href={{ route('home') }} >Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " href={{ route('products') }}>Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " href={{ route('invoices') }}>Invoices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href={{ route('orders') }}>Order</a>
                </li>
                <a class="nav-link active" href={{ route('insight') }}>Insight</a>
                </li>
            
            </ul>
        
            {{-- <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-primary" type="button">Search</button>
            </form> --}}
        
        </div>
    </div>
</nav>


{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
    <ul class="nav">
        <li class="nav-item" >
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
        <li class="nav-item">
            <a class="nav-link" href="/insight">Insight</a>
        </li>
        
    </ul>

</nav> --}}