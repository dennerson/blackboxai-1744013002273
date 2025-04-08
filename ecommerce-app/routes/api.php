<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::middleware('auth:sanctum')->group(function () {
    // Product routes
    Route::apiResource('products', ProductController::class)->except(['index', 'show']);
    
    // Order routes
    Route::apiResource('orders', OrderController::class);
});

// Public product routes
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);

// Authentication routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');