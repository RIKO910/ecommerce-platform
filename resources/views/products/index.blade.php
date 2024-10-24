@extends('master')

@section('content')
    <div class="max-w-7xl mx-auto py-6">
        <h2 class="text-2xl font-semibold text-center mb-6">Products</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('products.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded mb-4 inline-block">Create Product</a>

        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden mt-4">
            <thead>
            <tr>
                <th class="px-4 py-2 border-b">Name</th>
                <th class="px-4 py-2 border-b">Price</th>
                <th class="px-4 py-2 border-b">Subcategory</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="px-4 py-2 text-center border-b">{{ $product->name }}</td>
                    <td class="px-4 py-2 text-center border-b">${{ $product->new_price }}</td>
                    <td class="px-4 py-2 text-center border-b">{{ $product->subcategory->name }}</td>
                    <td class="px-4 py-2 flex justify-center border-b">
                        <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 text-white py-1 px-2 rounded">Edit</a>
                        <a href="{{ route('products.show', $product->id) }}" class="bg-blue-500 mx-4 text-white py-1 px-2 rounded">Show</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-2  rounded" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
