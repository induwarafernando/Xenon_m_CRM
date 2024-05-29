<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-4">Shopping Cart</h1>
    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="table-auto w-full mb-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Total</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->name }}</td>
                    <td class="border px-4 py-2">{{ $item->attributes->description }}</td>
                    <td class="border px-4 py-2">LKR {{ number_format($item->price, 2) }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 p-2 border">
                            <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded">Update</button>
                        </form>
                    </td>
                    <td class="border px-4 py-2">LKR {{ number_format($item->getPriceSum(), 2) }}</td>
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
        <div class="mt-6">
            <h2 class="text-2xl">Total: LKR {{ number_format(Cart::getTotal(), 2) }}</h2>
        </div>
    @endif
</div>