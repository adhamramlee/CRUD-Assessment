<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Redirect the root URL to the index method of ProductController
Route::get('/', [ProductController::class, 'index']);

// Resource route for products
Route::resource('products', ProductController::class);
