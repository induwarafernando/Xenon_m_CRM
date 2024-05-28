<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <!-- Include your CSS stylesheets here, e.g., Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Product Image -->
            <div>
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
            </div>
            <!-- Product Details -->
            <div class="flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
                    <p class="text-gray-700 mt-4">{{ $product->description }}</p>
                    <p class="text-red-600 text-2xl font-semibold mt-4">LKR {{ number_format($product->price, 2) }}</p>
                </div>
                <div class="mt-6">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" id="add-to-cart-form">
                        @csrf
                        <label for="quantity" class="block mb-2 text-sm font-medium text-gray-700">Quantity</label>
                        <input type="number" name="quantity" id="quantity" min="1" value="1" class="w-20 p-2 border border-gray-300 rounded mb-4">
                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include your JavaScript scripts here -->
    <script>
        document.getElementById('add-to-cart-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const quantity = document.getElementById('quantity').value;
            
            // Displaying a simple alert. You can replace this with any action like an AJAX call.
            alert('Adding ' + quantity + ' items to the cart.');

            // Uncomment the next line to actually submit the form after handling it via JS if needed
            // this.submit();
        });
    </script>
</body>

</html>
