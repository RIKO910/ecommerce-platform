@extends('master')

@section('content')
    <div class="max-w-2xl mx-auto py-6">
        <h2 class="text-2xl font-semibold text-center mb-6">Create Product</h2>

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

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Product Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" id="name" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" placeholder="Enter product name" value="{{ old('name') }}" required>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" placeholder="Enter product description" required>{{ old('description') }}</textarea>
            </div>

            <!-- Product Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                <input type="file" name="image" id="image" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" required>
            </div>

            <!-- Old Price -->
            <div>
                <label for="old_price" class="block text-sm font-medium text-gray-700">Old Price</label>
                <input type="number" name="old_price" id="old_price" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" placeholder="Enter old price" value="{{ old('old_price') }}">
            </div>

            <!-- New Price -->
            <div>
                <label for="new_price" class="block text-sm font-medium text-gray-700">New Price</label>
                <input type="number" name="new_price" id="new_price" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" placeholder="Enter new price" value="{{ old('new_price') }}" required>
            </div>

            <!-- Category Select -->
            <div>
                <label for="subcategory_id" class="block text-sm font-medium text-gray-700">Subcategory</label>
                <select name="subcategory_id" id="subcategory_id" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" required>
                    <option value="">Select a Subcategory</option>
                    @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md">Create Product</button>
            </div>
        </form>
    </div>
@endsection
