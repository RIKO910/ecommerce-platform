<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products      = Product::with('subcategory')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Display all products.
     */
    public function productView()
    {
        $products      = Product::with('subcategory')->get();
        $categories    = Category::with('subcategories')->get();
        return view('home', compact('products', 'categories'));
    }

    public function showBySubcategory($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();
        $products    = Product::where('subcategory_id', $subcategory->id)->get();
        return view('products.bySubcategory', compact('subcategory', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        return view('products.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'old_price' => 'nullable|numeric|min:0',
            'new_price' => 'required|numeric|min:0',
            'subcategory_id' => 'required|exists:subcategories,id'
        ]);

        // Generate slug from product name
        $slug = Str::slug($request->name);

        // Handle the image upload
        $imagePath = $request->file('image')->store('product_images', 'public');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'slug' => $slug,  // Automatically set the slug
            'subcategory_id' => $request->subcategory_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $subcategories = Subcategory::all();
        return view('products.edit', compact('product', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'old_price' => 'nullable|numeric|min:0',
            'new_price' => 'required|numeric|min:0',
            'subcategory_id' => 'required|exists:subcategories,id'
        ]);

        // Generate slug from product name
        $slug = Str::slug($request->name);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        } else {
            $imagePath = $product->image;
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'slug' => $slug,  // Automatically set the slug
            'subcategory_id' => $request->subcategory_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
