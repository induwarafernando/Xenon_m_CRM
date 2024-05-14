<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <!-- Include your CSS stylesheets here -->
</head>

<body>
    <div class="container">
        <h1>Product Detail</h1>
        <div class="product">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Price: ${{ $product->price }}</p>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit">Add to Cart</button>
            </form>
        </div>
        <div class="cart">
            <h2>Cart</h2>
            <ul>
                @foreach ($cartItems as $item)
                <li>{{ $item->product->name }} - ${{ $item->product->price }}</li>
                @endforeach
            </ul>
            <p>Total: ${{ $cartTotal }}</p>
            <a href="{{ route('cart.checkout') }}">Checkout</a>
        </div>
    </div>
    <!-- Include your JavaScript scripts here -->
</body>

</html>
