<?php

use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\RegionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('admin')->middleware('auth:jwt')->group(function () {
    require_once __DIR__ . '/admin.php';
});

Route::prefix('regions')->group(function () {
    Route::get('cities', [RegionController::class, 'getCities']);
    Route::get('cities/{city}/districts', [RegionController::class, 'getDistricts']);
});

Route::post('order', [OrderController::class, 'create']);
