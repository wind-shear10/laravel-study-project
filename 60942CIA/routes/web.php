<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello world!']);
});

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('/products', [ProductController::class, 'index']);

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('/order/{id}', [OrderController::class, 'show']);

Route::get('/product/{id}/orders', [ProductController::class, 'orders']);
