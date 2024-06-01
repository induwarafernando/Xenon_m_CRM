<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-8">
    <div class="flex justify-center">
        <div class="w-full max-w-2xl">
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif


                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Product Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name" type="text" name="name" placeholder="Product Name" required>
                </div>

                {{-- Hidden input fields --}}
                <input type="hidden" name="slug" id="slug">
                <input type="hidden" name="meta_title" id="meta_title">
                <input type="hidden" name="meta_description" id="meta_description">
                <input type="hidden" name="meta_keywords" id="meta_keywords">

                {{-- Category dropdown --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">
                        Category
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="category_id" name="category_id" required>
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Description --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Description
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="description" name="description" placeholder="Product Description" required></textarea>
                </div>

                {{-- Price --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                        Price (LKR)
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="price" type="number" name="price" step="0.01" placeholder="Price" required>
                </div>




    <!-- Image Upload Field -->
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
            Image
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="image" type="file" name="image" required>
    </div>
                {{-- Stocks Quantity --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="stocks">
                        Stocks Quantity
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="stocks" type="number" name="stocks" placeholder="Stocks Quantity" required>
                </div>

               
                <!-- Submit button -->
    <div class="flex items-center justify-between">
        <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit">
            Add Product
        </button>
    </div>
</form>
        </div>
    </div>
</div>

<!-- JavaScript to generate slug and meta tags -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        const metaTitleInput = document.getElementById('meta_title');
        const metaDescriptionInput = document.getElementById('meta_description');
        const metaKeywordsInput = document.getElementById('meta_keywords');

        nameInput.addEventListener('input', function () {
            const nameValue = nameInput.value.trim();
            const slug = nameValue.toLowerCase().replace(/\s+/g, '-');
            slugInput.value = slug;

            metaTitleInput.value = nameValue;
            metaDescriptionInput.value = `Description of ${nameValue}`;
            metaKeywordsInput.value = nameValue.split(' ').join(', ');
        });
    });
</script>

</body>
</html>
