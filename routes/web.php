<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\VendorController;
/*
| Core Route
*/
require __DIR__ . '/core.php';

/*
| App Route
*/
Route::group(['middleware' => ['role:user','get.menu']], function () {
  Route::resource('procurement',        ProcurementController::class);
  Route::resource('vendor',        VendorController::class);
});