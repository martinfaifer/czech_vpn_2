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
use App\Models\WaitingOnPause;

class ApiChangeVpnCustomerStatusController extends Controller
{

    public function pause(PauseVpnCustomerStatusRequest $request, PauseVpnAction $pauseVpnAction)
    {
        (new AbortIfIsNotAdminAction())->execute();

        $user = User::find($request->user_id);

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        try {
            WaitingOnPause::create([
                'user_id' => $user->id
            ]);

            return $this->api_sucess_response("Přidáno do fronty ke změně služby.");
        } catch (\Throwable $th) {
            return $this->api_error_response("Již je ve frontě ke změně služby.");
        }
    }

    public function start(StartVpnCustomerStatusRequest $request, StartVpnAction $startVpnAction)
    {
        (new AbortIfIsNotAdminAction())->execute();

        $user = User::find($request->user_id);

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        if(!WaitingOnPause::where('user_id', $user->id)->first()) {
            return $this->api_error_response("Služba není pozastavena");
        }

        WaitingOnPause::where('user_id', $user->id)->delete();

        return $startVpnAction->execute($user) == true
            ? $this->api_sucess_response("Služba spuštěna")
            : $this->api_error_response("Službu se nepodařilo spustit");
    }
}
