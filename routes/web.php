<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\VpnSpeedProductController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\UserPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Customers\CustomerVpnController;
use App\Http\Controllers\Customers\CustomerInformationController;

Route::get('/', function () {
    return view('vue');
});

Route::get('vpn/products', [VpnSpeedProductController::class, 'index']);


Route::prefix('login')->group(function () {
    Route::get('', function () {
        return redirect('/#/login');
    })->name('login');

    Route::post('', [AuthController::class, 'login']);
});

Route::post('registration', RegistrationController::class);

// Route::get('/email/verify', function () {
//     return redirect('/');
// })->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

// založení účtu
Route::post('customer', [CustomerInformationController::class, 'create']);

Route::middleware(["auth", "verified"])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::prefix('customer')->group(function () {
        Route::get('', [CustomerInformationController::class, 'show']);
        Route::post('password/change', UserPasswordController::class);
        Route::patch('{user}', [CustomerInformationController::class, 'update']);
        Route::delete('', [CustomerInformationController::class, 'destroy']);
        Route::prefix('vpn')->group(function () {
            // Route::get('{user}', [CustomerVpnController::class, 'show']);
            Route::post('', [CustomerVpnController::class, 'store']);
            Route::patch('{user}', [CustomerVpnController::class, 'update']);
            Route::post('change/product', [VpnSpeedProductController::class, 'change_product']);
        });
    });
});
