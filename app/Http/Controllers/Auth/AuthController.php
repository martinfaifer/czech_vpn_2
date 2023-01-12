<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Users\Auth\LoginAction;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(LoginRequest $request, LoginAction $loginAction)
    {
        return $loginAction->execute($request->email, $request->password) == true
            ? $this->success_response('Úspěšně přihlášeno')
            : $this->error_response('Neplatné přihlašovací údaje');
    }
}
