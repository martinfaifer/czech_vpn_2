<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Users\Auth\PasswordChangeAction;
use App\Http\Requests\UserChangePasswordRequest;

class UserPasswordController extends Controller
{
    public function __invoke(UserChangePasswordRequest $request, PasswordChangeAction $passwordChangeAction)
    {
        return $passwordChangeAction->execute($request) == true
            ? $this->success_response("Heslo změněno!")
            : $this->error_response("Nepodařilo se provést akci");
    }
}
