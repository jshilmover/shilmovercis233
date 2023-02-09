<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>

@foreach ($products as $product)
    <div>
        <div>Name: {{ $product['name'] }}</div>
        <div>Price: ${{ $product['price'] }}</div>
        <div>Item Number: {{ $product['item_number'] }}</div>
@endforeach

<body>

</body>

</html>
