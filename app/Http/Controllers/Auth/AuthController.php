<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Actions\Users\Auth\LoginAction;

class AuthController extends Controller
{
    public function login(LoginRequest $request, LoginAction $loginAction)
    {
        return $loginAction->execute($request->email, $request->password) == true
            ? $this->success_response('Úspěšně přihlášeno')
            : $this->error_response('Neplatné přihlašovací údaje');
    }

    public function logout()
    {
        Auth::logout();
    }
}
