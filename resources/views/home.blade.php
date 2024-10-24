@extends('master')

@section('content')

    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 mb-6">View All Products</h2>

            <div class="lg:flex lg:space-x-12">

                <!-- Sidebar for Categories and Subcategories -->
                <aside class="w-full lg:w-1/4 bg-gray-100 p-4 rounded-lg">
                    <h3 class="text-lg font-bold text-gray-700 mb-4">Categories & Subcategories</h3>

                    @foreach ($categories as $category)
                        <div class="mb-4">
                            <h4 class="text-md font-semibold text-gray-800">{{ $category->name }}</h4>

                            @if ($category->subcategories->count())
                                <ul class="ml-4 mt-2">
                                    @foreach ($category->subcategories as $subcategory)
                                        <li class="mb-1">
                                            <a href="{{ route('products.bySubcategory', $subcategory->slug) }}" class="text-blue-600 hover:text-blue-800">
                                                {{ $subcategory->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-sm text-gray-500">No subcategories available</p>
                            @endif
                        </div>
                    @endforeach
                </aside>

                <!-- Main Content for Products -->
                <main class="w-full lg:w-3/4">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                        @foreach ($products as $product)
                            <div class="group relative">
                                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700">
                                            <a href="{{ route('products.show', $product->id) }}">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{ $product->name }}
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $product->subcategory->name }}</p> <!-- Subcategory Name -->
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
                </main>
            </div>
        </div>
    </div>

@endsection
