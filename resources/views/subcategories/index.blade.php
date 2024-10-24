@extends('master')

@section('content')
    <div class="max-w-7xl mx-auto py-6">
        <h2 class="text-2xl font-semibold text-center mb-6">Subcategories</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('subcategories.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded mb-4 inline-block">Create Subcategory</a>

        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden mt-4">
            <thead>
            <tr>
                <th class="px-4 py-2 border-b">Name</th>
                <th class="px-4 py-2 border-b">Slug</th>
                <th class="px-4 py-2 border-b">Category</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subcategories as $subcategory)
                <tr>
                    <td class="px-4 py-2 text-center border-b">{{ $subcategory->name }}</td>
                    <td class="px-4 py-2 text-center border-b">{{ $subcategory->slug }}</td>
                    <td class="px-4 py-2 text-center border-b">{{ $subcategory->category->name }}</td>
                    <td class="px-4 py-2 flex justify-center border-b">
                        <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="bg-blue-500 text-white py-1 px-2 mx-4 rounded">Edit</a>
                        <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
