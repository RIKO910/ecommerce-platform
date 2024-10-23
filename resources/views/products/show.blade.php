@extends('master')

@section('content')
    <div class="max-w-2xl mx-auto py-6">
        <h2 class="text-2xl font-semibold text-center mb-6">Product Details</h2>

        <div class="bg-white p-6 shadow-md rounded-lg">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-64 h-64 mx-auto mb-6">

            <p><strong>Name:</strong> {{ $product->name }}</p>
            <p><strong>Subcategory:</strong> {{ $product->subcategory->name }}</p>
            <p><strong>Old Price:</strong> ${{ $product->old_price }}</p>
            <p><strong>New Price:</strong> ${{ $product->new_price }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>
        </div>
    </div>
@endsection
