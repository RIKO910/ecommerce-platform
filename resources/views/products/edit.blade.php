@extends('master')

@section('content')
    <div class="max-w-2xl mx-auto py-6">
        <h2 class="text-2xl font-semibold text-center mb-6">Edit Product</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" required>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                <input type="file" name="image" id="image" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 mt-4">
            </div>

            <div>
                <label for="old_price" class="block text-sm font-medium text-gray-700">Old Price</label>
                <input type="number" name="old_price" id="old_price" value="{{ old('old_price', $product->old_price) }}" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md">
            </div>

            <div>
                <label for="new_price" class="block text-sm font-medium text-gray-700">New Price</label>
                <input type="number" name="new_price" id="new_price" value="{{ old('new_price', $product->new_price) }}" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" required>
            </div>

            <div>
                <label for="subcategory_id" class="block text-sm font-medium text-gray-700">Subcategory</label>
                <select name="subcategory_id" id="subcategory_id" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md" required>
                    @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}" {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md">Update Product</button>
            </div>
        </form>
    </div>
@endsection
