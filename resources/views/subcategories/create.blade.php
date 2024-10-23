@extends('master')

@section('content')
    <div class="max-w-2xl mx-auto py-6">
        <h2 class="text-2xl font-semibold text-center mb-6">Create Subcategory</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('subcategories.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Subcategory Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Subcategory Name</label>
                <input type="text" name="name" id="name" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" placeholder="Enter subcategory name" value="{{ old('name') }}" required>
            </div>

            <!-- Subcategory Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Subcategory Slug</label>
                <input type="text" name="slug" id="slug" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" placeholder="Enter subcategory slug" value="{{ old('slug') }}" required>
            </div>

            <!-- Category Select -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category_id" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" required>
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700">Create Subcategory</button>
            </div>
        </form>
    </div>
@endsection
