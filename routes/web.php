<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customers\CustomerInformationController;
use App\Http\Controllers\Customers\CustomerVpnController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('vue');
});


Route::prefix('login')->group(function () {
    Route::get('', function () {
        abort(403);
    })->name('login');

    Route::post('', [AuthController::class, 'login']);
});

Route::prefix('customer')->group(function () {
    Route::get('{user}', [CustomerInformationController::class, 'show']);
    Route::post('', [CustomerInformationController::class, 'create']);
    Route::patch('{user}', [CustomerInformationController::class, 'update']);
    Route::delete('{user}', [CustomerInformationController::class, 'destroy']);
    Route::prefix('vpn')->group(function () {
        Route::get('{user}', [CustomerVpnController::class, 'show']);
    });
});
