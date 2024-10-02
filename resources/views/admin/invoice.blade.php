<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>hi</h1>

    <h3>Customer Name: {{ $order->name }}</h3>
    <h3>Customer Email: {{ $order->email }}</h3>
    <h3>Customer Address: {{ $order->address }}</h3>
    <h3>Customer Phone: {{ $order->phone }}</h3>
    <h3>Product Title: {{ $order->product_title }}</h3>
    <h3>Product Quantity: {{ $order->quantity }}</h3>
    <h3>Product price: {{ $order->price }}</h3>
    
</body>
</html>
