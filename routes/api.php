<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCustomerController;
use App\Http\Controllers\Api\ApiVpnCustomerController;
use App\Http\Controllers\VpnSpeedProductController;



Route::prefix('v1')->group(function () {
    Route::get('vpn/products', [VpnSpeedProductController::class, 'index']);
    Route::middleware('auth.basic')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::prefix('customer')->group(function () {
                Route::get("", [ApiCustomerController::class, 'index']);
                Route::get("{user}", [ApiCustomerController::class, 'show']);
                Route::post('', [ApiCustomerController::class, 'create']);
                Route::patch("{user}", [ApiCustomerController::class, 'update']);
                Route::delete("{user}", [ApiCustomerController::class, 'destroy']);
            });


            Route::prefix('vpn')->group(function () {
                Route::prefix('customer')->group(function () {
                    // zobrazení dat o jednom uživately
                    Route::get("{user}", [ApiVpnCustomerController::class, 'show']);
                    // vytvoření vpn
                    Route::post('{user}', [ApiVpnCustomerController::class, 'store']);
                    // změna tarifu
                    Route::patch("{user}", [ApiVpnCustomerController::class, 'update']);
                    // odebrání vpn
                });
            });
        });
    });
});
