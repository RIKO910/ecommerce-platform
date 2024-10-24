<nav class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 justify-between">
            <a href="{{route('home')}}" class="inline-flex items-center font-bold px-1 pt-1 text-sm  hover:text-gray-700">Home</a>
            <div class="flex flex-1 items-center justify-center sm:items-stretch">
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{route('categories.index')}}" class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Category</a>
                    <a href="{{route('subcategories.index')}}" class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">SubCategory</a>
                    <a href="{{route('products.index')}}" class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Product</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 pb-4 pt-2">
            <a href="{{route('categories.index')}}" class="block border-l-4  py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700">Category</a>
            <a href="{{route('subcategories.index')}}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700">SubCategory</a>
            <a href="{{route('products.index')}}" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700">Product</a>
        </div>
    </div>
</nav>
