<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Users\Auth\RegistrationAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $request, RegistrationAction $registrationAction)
    {
        // $request-validated();
        return $registrationAction->execute(
            username: $request->username,
            email: $request->email,
            password: $request->password
        ) == true
            ? $this->success_response("Registrováno, prosím ověřte svou emailovou adresu klpenutím na odkaz ve Vašem emailu")
            : $this->error_response("Nepodařilo se registrovat, prosím obraťte se na naší podporu");
    }
}
