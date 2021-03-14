<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminColorController;
use App\Http\Controllers\Admin\AdminOptionController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSizeController;
use App\Http\Controllers\Admin\AdminUploadController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCategoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('login', [AdminLoginController::class, 'authenticate'])->name('login')->withoutMiddleware('auth:jwt');
    Route::get('getProfile', [AdminLoginController::class, 'getProfile']);
    Route::get('logout', [AdminLoginController::class, 'logout'])->name('logout')->withoutMiddleware('auth:jwt');
});

Route::prefix('users')->group(function () {
    Route::get('', [AdminUserController::class, 'list']);
    Route::post('', [AdminUserController::class, 'store']);
    Route::get('{id}', [AdminUserController::class, 'detail']);
    Route::put('{id}', [AdminUserController::class, 'save']);
    Route::delete('{id}', [AdminUserController::class, 'delete']);
});

Route::prefix('categories')->group(function () {
    Route::get('', [AdminCategoryController::class, 'list']);
    Route::post('', [AdminCategoryController::class, 'store']);
    Route::get('{id}', [AdminCategoryController::class, 'detail']);
    Route::put('{id}', [AdminCategoryController::class, 'save']);
    Route::delete('{id}', [AdminCategoryController::class, 'delete']);
});

Route::prefix('sizes')->group(function () {
    Route::get('', [AdminSizeController::class, 'list']);
    Route::get('by-category/{category_id}', [AdminSizeController::class, 'findByCategory']);
    Route::post('', [AdminSizeController::class, 'store']);
    Route::get('{id}', [AdminSizeController::class, 'detail']);
    Route::put('{id}', [AdminSizeController::class, 'save']);
    Route::delete('{id}', [AdminSizeController::class, 'delete']);
});

Route::prefix('colors')->group(function () {
    Route::get('', [AdminColorController::class, 'list']);
    Route::post('', [AdminColorController::class, 'store']);
    Route::get('{id}', [AdminColorController::class, 'detail']);
    Route::put('{id}', [AdminColorController::class, 'save']);
    Route::delete('{id}', [AdminColorController::class, 'delete']);
});

Route::prefix('products')->group(function() {
    Route::get('', [AdminProductController::class, 'list']);
    Route::get('{id}', [AdminProductController::class, 'detail']);
    Route::post('', [AdminProductController::class, 'store']);
    Route::put('{id}', [AdminProductController::class, 'save']);
    Route::delete('{id}', [AdminProductController::class, 'delete']);
});

Route::prefix('options')->group(function() {
    Route::get('', [AdminOptionController::class, 'list']);
    Route::get('{id}', [AdminOptionController::class, 'detail']);
    Route::post('', [AdminOptionController::class, 'store']);
    Route::put('{id}', [AdminOptionController::class, 'save']);
    Route::delete('{id}', [AdminOptionController::class, 'delete']);
});

Route::post('upload', [AdminUploadController::class, 'storeImage']);
