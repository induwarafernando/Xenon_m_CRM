<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Include your CSS stylesheets here -->
</head>
<body>
    <div class="container">
        <h1>Shopping Cart</h1>
        <ul>
            @foreach ($cartItems as $item)
                <li>{{ $item->name }} - ${{ $item->price }} x {{ $item->quantity }}</li>
            @endforeach
        </ul>
        <p>Total: ${{ \Cart::session(auth()->id())->getTotal() }}</p>
    </div>
</body>
</html>
