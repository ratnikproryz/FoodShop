<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Api\LoginController;
use App\Models\Product;
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

Route::get('/home', function (Request $request) {
    return response()->json([
        'text' => 'Thien am ben bo vu tru'
    ], 200);
});

Route::get('/product', function (Request $request) {
    $product = Product::latest()->first();
    return response()->json(['result' => $product], 200);
});

Route::post('login', [LoginController::class, 'login']);

Route::prefix('/address')->name('address.')->group(function () {
    Route::get("/provinces", [AddressController::class, "provinces"])->name('provinces');
    Route::get("/districts/{id}", [AddressController::class, "districts"])->name('districts');
    Route::get("/wards/{id}", [AddressController::class, "wards"])->name('wards');
    Route::get("/user-address/{id}",[AddressController::class, "getUserAddress"]);
    Route::put('/update/{id}', [AddressController::class, "saveAddress"])->name('update');
});