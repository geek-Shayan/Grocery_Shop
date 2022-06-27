<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">   
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>

    <body>

        <div class="container-fluid "  >

            <!-- Carousel -->
            <div id="demo" class="carousel slide bg-dark" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    {{-- <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button> --}}
                </div>
                
                <!-- The slideshow/carousel -->
                <div class="carousel-inner " align="center">
                    {{-- <div class="carousel-item active">
                        <img class="img-fluid" src="https://cdn2.vectorstock.com/i/1000x1000/49/86/logo-for-grocery-store-vector-22844986.jpg" alt="Los Angeles" class="d-block"  style="width:40%  ">
                        <div class="carousel-caption">
                            <h1>GROCERY SHOP</h1> 
                            <h3><a href="/order" class="btn btn-primary"><b> Order Now !!!</b></a></h3>

                            <h3>Los Angeles</h3>
                            <p>We had such a great time in LA!</p>
                        </div>
                    </div> --}}
                    <div class="carousel-item active">
                        <img class="img-fluid" src="https://i0.wp.com/krushiphal.com/wp-content/uploads/2020/07/Best-Quality-Fresh-Mango-Exporters-India-2.jpg?resize=800%2C400&ssl=1" alt="Los Angeles" class="d-block"  style="height:20%  ">
                        <div class="carousel-caption">
                            {{-- <h1 class="text-dark ">GROCERY SHOP</h1>  --}}
                            <h4 class="text-dark ">Fresh Mangoes</h4>
                            <h3><a href="/order" class="btn btn-success "><b> Order Now !!!</b></a></h3>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid" src="https://www.leicestermarket.co.uk/wp-content/uploads/2019/08/outdoor-market-aug-19-04-700x300.jpg" alt="Chicago" class="d-block" style="width:70%">
                        <div class="carousel-caption">
                            {{-- <h1 class="text-dark ">GROCERY SHOP</h1>  --}}
                            <h4 class="text-dark ">Fresh Apples</h4>
                            <h3><a href="/order" class="btn btn-success "><b> Order Now !!!</b></a></h3>

                        </div> 
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid" src="https://vmstrading.cl/assets/img/fruits/fresh-fruit/oranges-700x300.jpg" alt="New York" class="d-block" style="width:70%" >
                        <div class="carousel-caption">
                            {{-- <h1 class="text-dark ">GROCERY SHOP</h1> --}}
                            <h4 class="text-dark ">Fresh Oranges</h4>
                            <h3><a href="/order" class="btn btn-success"><b> Order Now !!!</b></a></h3>
                        </div>  
                    </div>
                </div>
                
                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

        </div>

    </body>
</html>
