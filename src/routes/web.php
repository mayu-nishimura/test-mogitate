<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::post('/products/register', [AuthorController::class, 'store'])->name('products.store');
Route::get('/products/register', [ProductController::class, 'create'])->name('products.register');

Route::get('/products/{:productId}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{:productId}/update', [ProductController::class, 'update'])->name('products.update');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/sort', [ProductController::class, 'sort'])->name('products.sort');