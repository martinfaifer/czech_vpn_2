<?php

namespace App\Http\Controllers\Customers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateVpnRequest;
use App\Http\Requests\UpdateCustomerVpnRequest;
use App\Http\Resources\ShowVpnCustomerResource;
use App\Actions\Users\Customers\Vpn\Credentials\CreateVpnAccountAction;
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

    public function store(CreateVpnRequest $request, CreateVpnAccountAction $createVpnAccountAction)
    {
        $user = Auth::user();

        // založení vpn
        return $createVpnAccountAction->execute($user, $request) == true
            ? $this->success_response("Děkujeme za vybrání produktu.")
            : $this->error_response("Bohužel se něco pokazilo, prosím obraťte se na naši podporu.");
    }
}
