{{--resources/views/categories/create.blade.php--}}

@extends('master')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Create a New Category</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Category Form -->
        <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Category Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter category name" required>
            </div>

            <!-- Category Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Category Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter category slug" required>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-300 ease-in-out">
                    Create Category
                </button>
            </div>
        </form>
    </div>
@endsection
