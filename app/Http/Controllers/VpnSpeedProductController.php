<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserPaymentRequest;
use App\Http\Resources\IndexVpnSpeedProductsResource;
use App\Actions\Users\Customers\Vpn\Products\ChangeProductAction;

class VpnSpeedProductController extends Controller
{
    public function index()
    {
        return new IndexVpnSpeedProductsResource([]);
    }

    // public function update(UserPaymentRequest $request, User $user, ChangeProductAction $changeProductAction)
    // {
    //     $customerVpnData = $changeProductAction->execute($user, $request->vpn_speed_products_id);
    //     return $customerVpnData == false
    //         ? $this->api_error_response("Nepodařilo se změnit")
    //         : $this->api_sucess_response($customerVpnData);
    // }
}
