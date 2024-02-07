<x-app-layout>
    <div class="container mx-auto mt-1">
        <div class="space-y-10 divide-y divide-gray-900/10">
            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-8 sm:px-auto">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">
                        Update Product Category
                    </h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Update the product category's details.
                    </p>
                </div>
                <form method="post"
                    @if($product_category->id)
                    action="{{ route('product_category.update', $product_category->id) }}"
                    @else
                    action="{{ route('product_category.store') }}"
                    @endif
                    class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2 mx-auto w-full max-w-2xl">
                    @csrf
                    @if ($product_category->id)
                        @method('PUT')
                    @endif
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                                    Name
                                </label>
                                <div class="mt-2">
                                    <input id="name" name="name" rows="3"
                                        value="{{ old('name', $product_category->name) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Name of the product category.
                                </p>
                                @error('name')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="col-span-full">
                                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">
                                    Description
                                </label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="3"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description', $product_category->description) }}</textarea>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Description of the product category.
                                </p>
                                @error('description')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-4 sm:px-6 flex justify-between">
                        <a href="{{ route('product_category.index') }}"
                            class="inline-flex justify-center w-1/3 rounded-md border border-gray-300 bg-white px-4 py-2 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex justify-center w-1/3 rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
