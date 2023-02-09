<?php

namespace App\Http\Controllers\Customers\Payment;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPaymentRequest;

class PaymentController extends Controller
{
    public function qr(UserPaymentRequest $request, User $user)
    {
        //
    }
}
