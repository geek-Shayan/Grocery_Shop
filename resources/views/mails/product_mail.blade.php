<!DOCTYPE html>
<html lang="en">
<head>
    <title>Grocery Shop Product mail</title>
</head>
<body>
    <h1>PRODUCT MAIL</h1>
    <p>Downloaded on {{ $date }}</p>

    <div class="container-fluid bg-success">
        <h3>VIEW PRODUCT</h3>    
    </div>
    
    <br>
    
    <div class="container" style="text-align: center" style="width:50%">
        <h6>PRODUCT ID :            <output name="id" >{{$product->id}}</output></h6>
        <h6>NAME :                  <output name="name" >{{$product->name}}</output></h6>
        <h6>SKU :                   <output name="sku" >{{$product->sku}}</output></h6>
        <h6>DESCRIPTION :           <output name="description" >{{$product->description}}</output></h6>
        <h6>AVAILABLE QUANTITY :    <output name="available_quantity" >{{$product->available_quantity}} Pcs</output></h6>
        <h6>PURCHASE PRICE :        <output name="purchase_price" >{{$product->purchase_price}} Tk</output></h6>
        <h6>PROFIT RANGE :          <output name="profit_range" >{{$product->profit_range}} Tk</output></h6>
        <h6>SELLING PRICE :         <output name="selling_price" >{{$product->selling_price}} Tk</output></h6>

        <img src="{{ asset('storage/app/images/'.$product->image) }}" alt="{{$product->name}}" title="{{$product->name}}" style="width:40%">
    
    </div>
    
</body>
</html>