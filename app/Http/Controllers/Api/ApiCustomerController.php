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

class ApiCustomerController extends Controller
{
    public function index()
    {
        (new AbortIfIsNotAdminAction())->execute();

        return new ApiIndexCustomerResource(Auth::user());
    }

    public function create(RegistrationRequest $request, RegistrationAction $registrationAction)
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

    public function show(User $user)
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

    public function destroy(User $user, ApiDestroyCustomerAction $apiDestroyCustomerAction)
    {
        (new AbortIfIsNotAdminAction())->execute();

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        return $apiDestroyCustomerAction->execute($user) == true
            ? $this->api_sucess_response("Odebráno")
            : $this->api_error_response("Nepodařilo se odebrat zákzaníka");
    }
}
