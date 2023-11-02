<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

</head>
<body>

@php
    $product = new \App\Models\Product();

    $product = $product->findOrFail(6);
@endphp

<form action="{{ route('product.store-image', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" id="image">
    <input type="submit" value="submit">

    @foreach($product->productImages as $image)
        <img src="{{ asset("storage/" . $image->image) }}" alt="">
    @endforeach
</form>
</body>
</html>
