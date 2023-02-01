<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customers\CustomerInformationController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware("auth.basic")->group(function () {

    Route::prefix('customer')->group(function () {
        Route::get('{user}', function () {
            //
        });

        Route::prefix('vpn')->group(function () {
            Route::get('{user}', [CustomerInformationController::class, 'show']);
            Route::post('', [CustomerInformationController::class, 'create']);
            Route::patch('{user}', [CustomerInformationController::class, 'update']);
            Route::prefix('vpn')->group(function () {
                Route::patch('{user}', [CustomerVpnController::class, 'update']);
            });
        });
    });
});
