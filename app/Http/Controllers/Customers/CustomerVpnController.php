<?php

namespace App\Http\Controllers\Customers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCustomerVpnRequest;
use App\Http\Resources\ShowVpnCustomerResource;
use App\Actions\Users\Customers\Vpn\Credentials\UpdateVpnPasswordAction;

class CustomerVpnController extends Controller
{
    public function show(User $user)
    {
        return new ShowVpnCustomerResource($user);
    }

    public function update(UpdateCustomerVpnRequest $request, User $user, UpdateVpnPasswordAction $updateVpnPasswordAction)
    {
        return $updateVpnPasswordAction->execute($user) == true
            ? $this->success_response("Upraveno")
            : $this->error_response("Nepodařilo se upravit");
    }
}
