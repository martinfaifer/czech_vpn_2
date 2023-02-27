<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrationRequest;
use App\Actions\Users\Auth\RegistrationAction;
use App\Http\Requests\ApiUpdateCustomerRequest;
use App\Http\Resources\ApiShowCustomerResource;
use App\Http\Resources\ApiIndexCustomerResource;
use App\Actions\Api\Customer\ApiUpdateCustomerAction;
use App\Actions\Users\Admins\AbortIfIsNotAdminAction;
use App\Actions\Api\Customer\ApiDestroyCustomerAction;
use App\Models\WaitingOnDelete;

class ApiCustomerController extends Controller
{
    public function index(): ApiIndexCustomerResource
    {
        (new AbortIfIsNotAdminAction())->execute();

        return new ApiIndexCustomerResource(Auth::user());
    }

    public function create(RegistrationRequest $request, RegistrationAction $registrationAction): array
    {
        (new AbortIfIsNotAdminAction())->execute();

        $registrationResponse = $registrationAction->execute(
            username: $request->username,
            email: $request->email,
            password: $request->password,
            userTypeId: UserType::GENERATE_BY_API,
            ispId: Auth::user()->isp_id
        );

        if ($registrationAction == false) {
            $this->api_error_response("Nepodařilo se registrovat, prosím obraťte se na naší podporu");
        }

        return $this->api_sucess_response($registrationResponse);
    }

    public function show(User $user): ApiShowCustomerResource
    {
        (new AbortIfIsNotAdminAction())->execute();

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        return (new ApiShowCustomerResource($user));
    }

    public function update(ApiUpdateCustomerRequest $request, User $user, ApiUpdateCustomerAction $apiUpdateCustomerAction)
    {
        (new AbortIfIsNotAdminAction())->execute();

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        return $apiUpdateCustomerAction->execute(user: $user, name: $request->name) == true
            ? $this->api_sucess_response("Upraveno")
            : $this->api_error_response("Nepodařilo se změnit záznam");
    }

    public function destroy(User $user)
    {
        (new AbortIfIsNotAdminAction())->execute();

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        try {
            WaitingOnDelete::create([
                'user_id' => $user->id
            ]);

            return  $this->api_sucess_response("Přidáno do fronty k odebrání, záznam bude odebrán k 1. dni následujícího měsíce");
        } catch (\Throwable $th) {
            return $this->api_error_response("Již čeká na smazání");
        }
    }
}
