<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
        }
        .cart-section {
            width: 65%;
        }
        .summary-section {
            width: 30%;
        }
        .text-3xl {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .table-auto {
            width: 100%;
            border-collapse: collapse;
        }
        .table-auto th, .table-auto td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        .table-auto th {
            background-color: #f8f8f8;
        }
        .product-image {
            width: 100px;
            height: auto;
        }
        .w-16 {
            width: 4rem;
        }
        .p-2 {
            padding: 0.5rem;
        }
        .border {
            border: 1px solid #ccc;
        }
        .bg-blue-500 {
            background-color: #3490dc;
        }
        .bg-red-500 {
            background-color: #e3342f;
        }
        .text-white {
            color: #fff;
        }
        .py-1 {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }
        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }
        .rounded {
            border-radius: 0.25rem;
        }
        .mt-6 {
            margin-top: 1.5rem;
        }
        .text-2xl {
            font-size: 1.5em;
        }
        .mb-4 {
            margin-bottom: 1rem;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #000;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Cart Section -->
        <div class="cart-section">
            <h1 class="text-3xl">Shopping Cart</h1>
            <!-- Success message -->
            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <!-- Shopping cart table -->
            @if($cartItems->isEmpty())
                <p>Your cart is empty.</p>
            @else
                <table class="table-auto w-full mb-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Product</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Quantity</th>
                            <th class="px-4 py-2">Total</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                        <tr>
                            <td class="border px-4 py-2">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="product-image">
                                <div>{{ $item->name }}</div>
                            </td>
                            <td class="border px-4 py-2">{{ number_format($item->price, 2) }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 p-2 border">
                                    <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded">Update</button>
                                </form>
                            </td>
                            <td class="border px-4 py-2">{{ number_format($item->getPriceSum(), 2) }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded">Clear Cart</button>
                </form>
            @endif
        </div>

        <!-- Summary Section -->
        <div class="summary-section">
            <h2 class="text-3xl">Order Summary</h2>
            <div class="mb-4">
                <p class="text-xl">Subtotal: {{ number_format(Cart::getTotal(), 2) }}</p>
            </div>
            {{-- // Add shipping cost --}}
            <div class="mb-4">
                <p class="text-xl">Shipping: Free</p>
            </div>
            {{-- //checkout button --}}
            <a href="{{ route('checkout.show') }}" class="button">Checkout</a>


        </div>
    </div>
</body>
</html>

