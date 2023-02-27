<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Users\Auth\LoginAction;
use App\Http\Requests\ManagementLoginRequest;

class ManagementAuthController extends Controller
{
    public function login(ManagementLoginRequest $request, LoginAction $loginAction)
    {
        return $loginAction->execute($request->email, $request->password, true) == true
            ? $this->success_response('Úspěšně přihlášeno')
            : $this->error_response('Neplatné přihlašovací údaje');
    }
}
