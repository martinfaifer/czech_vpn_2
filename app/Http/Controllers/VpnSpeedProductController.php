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

    public function change_product(UserPaymentRequest $request, ChangeProductAction $changeProductAction)
    {
        $qr = $changeProductAction->execute(Auth::user(), $request);
        return $qr == false
            ? $this->error_response("Již máte objednanou službu, čeká se na přijetí platby.")
            : $this->success_response($qr);
    }
}
