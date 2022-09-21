<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\VendorController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('vendor')->middleware('auth:sanctum')->group(function () {
    Route::get('/lists', [VendorController::class, 'lists'])->name('juristic.lists');
    Route::get('/checkexist/{id}', [VendorController::class, 'checkexists'])->name('juristic.checkexist');
});

Route::prefix('address')->group(function () {
    Route::get('/province', [AddressController::class, 'province'])->name('address.province');
    Route::get('/amphures/{id}', [AddressController::class, 'amphures'])->name('address.amphures');
    Route::get('/district/{id}', [AddressController::class, 'district'])->name('address.district');
});
