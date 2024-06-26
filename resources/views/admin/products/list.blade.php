<x-app-layout>
    <div class="container mx-auto mt-1">
        <div class="px-4 sm:px-6 lg:px-8 bg-white pt-4">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mb-5"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 5.652a.5.5 0 010 .707L9.707 10l4.641 4.641a.5.5 0 11-.707.707L9 10.707l-4.641 4.641a.5.5 0 11-.707-.707L8.293 10 3.652 5.359a.5.5 0 01.707-.707L9 9.293l4.641-4.641a.5.5 0 01.707 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
            @endif

            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Products</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the products including their name, image, price, stocks, and category.</p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a href="{{ route('products.create') }}"
                        class="block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Create Product
                    </a>
                </div>
            </div>

            <div class="container mx-auto mt-1">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                        <thead class="text-xs text-white uppercase bg-blue-700 border-b border-blue-400 dark:text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stocks
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-blue-100' : 'bg-blue-50' }} border-b border-blue-400 text-black hover:bg-blue-200">
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-blue-100">
                                    {{ $product->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $product->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}" class="w-auto mt-8 ml-25 object-cover" style="height: 100px;  border-color: black; border-width: 1px; border-style: solid;">
                                </td>
                                <td class="px-6 py-4">
                                    LKR {{ number_format($product->price, 2) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->stocks }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $product->category->name }}
                                </td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                    <div class="flex gap-3">
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-green-600 hover:text-emerald-50">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-red-500 hover:text-rose-100">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- {{ $products->links() }} --}}
    </div>
</x-app-layout>
