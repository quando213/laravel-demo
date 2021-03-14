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
Route::get('/{categorySlug}', [WebController::class, 'category'])->name('category');
Route::get('/{categorySlug}/{productSlug}', [WebController::class, 'product'])->name('product');

//Route::prefix('admin')->group(function() {
//    Route::view('auth/login', 'entry/login')->name('login');
//    Route::view('product', 'admin/product');
//    Route::view('user', 'admin/user');
//});
