<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;


Route::get('/', [ProductController::class, 'productView'])->name('home');
Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubcategoryController::class);
Route::resource('products', ProductController::class);
Route::get('/subcategory/{slug}', [ProductController::class, 'showBySubcategory'])->name('products.bySubcategory');


