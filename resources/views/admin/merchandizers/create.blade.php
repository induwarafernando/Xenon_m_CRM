@extends('layouts.admin')  {{-- Assuming you have a master admin layout --}}

@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <form method="POST" action="{{ route('admin.merchandizers.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Name
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" type="text" name="name" placeholder="Merchandizer Name" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="email" name="email" placeholder="Merchandizer Email" required>
                    </div>

                    {{-- Add other fields as needed --}}

                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Create Merchandizer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
