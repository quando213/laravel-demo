<?php

use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/cart', [WebController::class, 'cart'])->name('cart');
Route::get('/checkout', [WebController::class, 'checkout'])->name('checkout');
Route::get('/{categorySlug}', [WebController::class, 'category'])->name('category');
Route::get('/{categorySlug}/{productSlug}', [WebController::class, 'product'])->name('product');
