<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCustomerController;
use App\Http\Controllers\Api\ApiVpnCustomerController;
use App\Http\Controllers\ApiChangeVpnCustomerStatusController;
use App\Http\Controllers\VpnSpeedProductController;



Route::prefix('v1')->group(function () {
    Route::middleware('auth.basic')->group(function () {
        // Route::prefix('admin')->group(function () {
        Route::prefix('customer')->group(function () {
            Route::get("", [ApiCustomerController::class, 'index']);
            Route::get("{user}", [ApiCustomerController::class, 'show']);
            Route::post('', [ApiCustomerController::class, 'create']);
            Route::patch("{user}", [ApiCustomerController::class, 'update']);
            Route::delete("{user}", [ApiCustomerController::class, 'destroy']);
        });

        Route::prefix('vpn')->group(function () {
            Route::get('products', [VpnSpeedProductController::class, 'index']);
            Route::prefix('customer')->group(function () {
                // zobrazení dat o jednom uživately
                Route::get("{user}", [ApiVpnCustomerController::class, 'show']);
                // vytvoření vpn
                Route::post('{user}', [ApiVpnCustomerController::class, 'store']);
                // pozastavení sluzby
                Route::patch('pause', [ApiChangeVpnCustomerStatusController::class, 'pause']);
                // spuštění služby
                Route::patch('start', [ApiChangeVpnCustomerStatusController::class, 'start']);
                // změna tarifu
                Route::patch("{user}", [ApiVpnCustomerController::class, 'update']);
                // odebrání vpn
                Route::delete('{user}', [ApiVpnCustomerController::class, 'destroy']);
            });
        });
        // });
    });
});
