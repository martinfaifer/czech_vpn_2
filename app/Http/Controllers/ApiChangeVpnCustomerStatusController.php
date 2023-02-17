<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PauseVpnCustomerStatusRequest;
use App\Http\Requests\StartVpnCustomerStatusRequest;
use App\Actions\Users\Admins\AbortIfIsNotAdminAction;
use App\Actions\Users\Customers\Vpn\Products\PauseVpnAction;
use App\Actions\Users\Customers\Vpn\Products\StartVpnAction;

class ApiChangeVpnCustomerStatusController extends Controller
{

    public function pause(PauseVpnCustomerStatusRequest $request, PauseVpnAction $pauseVpnAction)
    {
        (new AbortIfIsNotAdminAction())->execute();

        $user = User::find($request->user_id);

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        return $pauseVpnAction->execute($user) == true
            ? $this->api_sucess_response("Služba zastavena")
            : $this->api_error_response("Službu se nepodařilo zastavit");
    }

    public function start(StartVpnCustomerStatusRequest $request, StartVpnAction $startVpnAction)
    {
        (new AbortIfIsNotAdminAction())->execute();

        $user = User::find($request->user_id);

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        return $startVpnAction->execute($user) == true
            ? $this->api_sucess_response("Služba spuštěna")
            : $this->api_error_response("Službu se nepodařilo spustit");
    }
}
