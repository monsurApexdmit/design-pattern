<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/order', [OrderController::class, 'placeOrder']);
//update commit

Route::post('/posts', [PostController::class, 'store']);
Route::get('/search', [PostController::class, 'index']);
