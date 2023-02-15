<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\RegistrationRequest;
use App\Actions\Users\Auth\RegistrationAction;

class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $request, RegistrationAction $registrationAction)
    {
        $registrationResponse = $registrationAction->execute(
            username: $request->username,
            email: $request->email,
            password: $request->password,
            userTypeId: UserType::CUSTOMER
        );

        if ($registrationResponse == false) {
            return $this->error_response("Nepodařilo se registrovat, prosím obraťte se na naší podporu");
        }

        event(new Registered($registrationResponse));


        return $this->success_response("Registrováno, prosím ověřte svou emailovou adresu klpenutím na odkaz ve Vašem emailu");
    }
}
