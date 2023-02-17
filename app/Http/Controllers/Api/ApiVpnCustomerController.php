<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\PausedVpn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateVpnRequest;
use App\Http\Requests\UserPaymentRequest;
use App\Http\Resources\ShowApiVpnCustomerResource;
use App\Actions\Users\Admins\AbortIfIsNotAdminAction;
use App\Actions\Users\Customers\Vpn\Products\ChangeProductAction;
use App\Actions\Users\Customers\Vpn\Credentials\CreateVpnAccountAction;
use App\Actions\Users\Customers\Vpn\Credentials\SaveDeletedDataToTableAction;

class ApiVpnCustomerController extends Controller
{
    public function show(User $user)
    {
        (new AbortIfIsNotAdminAction())->execute();

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        return new ShowApiVpnCustomerResource($user);
    }

    public function store(CreateVpnRequest $request, User $user, CreateVpnAccountAction $createVpnAccountAction)
    {
        (new AbortIfIsNotAdminAction())->execute();

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        if (!is_null($user->product_id)) {
            abort(405);
        }

        $vpnCustomerData = $createVpnAccountAction->execute(user: $user, formData: $request, sendEmailToCustomer: false, returnBool: false);

        return $vpnCustomerData == false
            ? $this->api_error_response("Nepodařilo se přidat službu k zákazníkovi")
            : $this->api_sucess_response($vpnCustomerData);
    }

    public function update(UserPaymentRequest $request, User $user, ChangeProductAction $changeProductAction)
    {
        (new AbortIfIsNotAdminAction())->execute();

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        // ověření, zda zákazník je v paused_vpns_table
        if (PausedVpn::where('user_id', $user->id)->first()) {
            return $this->api_error_response("Zákazník má pozastavenou službu");
        }

        $customerVpnData = $changeProductAction->execute($user, $request->vpn_speed_products_id);
        return $customerVpnData == false
            ? $this->api_error_response("Nepodařilo se změnit")
            : $this->api_sucess_response($customerVpnData);
    }

    public function destroy(User $user, SaveDeletedDataToTableAction $saveDeletedDataToTableAction)
    {
        (new AbortIfIsNotAdminAction())->execute();

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        return $saveDeletedDataToTableAction->execute(user: $user) == true
            ? $this->api_sucess_response("Odebráno")
            : $this->api_error_response("Nepodařilo se odebrat");
    }
}
