<?php

namespace App\Http\Controllers\Customers;

use App\Http\Resources\ShowVpnCustomerResource;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerVpnController extends Controller
{
    public function show(User $user)
    {
        return new ShowVpnCustomerResource($user);
    }
}
