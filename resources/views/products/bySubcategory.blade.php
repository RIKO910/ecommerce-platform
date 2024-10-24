{{-- resources/views/products/bySubcategory.blade.php --}}

@extends('master')

@section('content')
    <div class="max-w-7xl mx-auto py-6">
        <h2 class="text-3xl font-semibold text-center mb-6">{{ $subcategory->name }}</h2>

        @if($products->isEmpty())
            <p class="text-center text-gray-500">No products available in this subcategory.</p>
        @else
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($products as $product)
                    <div class="group relative">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="#">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $subcategory->name }}</p> <!-- Show subcategory name -->
                            </div>
                            <div>
                                @if ($product->old_price)
                                    <p class="text-sm font-medium text-gray-500 line-through">${{ number_format($product->old_price, 2) }}</p>
                                @endif
                                <p class="text-sm font-medium text-gray-900">${{ number_format($product->new_price, 2) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
