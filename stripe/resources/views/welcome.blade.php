<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel --Stripe</title>
</head>
<body>
    <h1>Product :Laptop</h1>
    <h2>Price : $50</h2>
    <form action="{{route('stripe')}}"  method="post">
        @csrf
        <input type="hidden" name="price" value="50"/>
        <input type="hidden" name="product_name" value="Laptop"/>
        <input type="hidden" name="quantity" value="1"/>
        <button type="submit">Pay with stripe</button>

    </form>
</body>
</html>