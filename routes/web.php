<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TestController;

Route::get('/', [ProductController::class, 'main'])->name('main');
Route::get('/product/import', [ProductController::class, 'import']);
Route::get('/product/{e_id}', [ProductController::class, 'show']);

Route::post('/product/import', [ProductController::class, 'store']);

Route::post('/test/images/store', [TestController::class, 'store']);