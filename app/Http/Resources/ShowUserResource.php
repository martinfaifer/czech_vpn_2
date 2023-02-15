<?php

namespace App\Http\Resources;

use App\Models\Radcheck;
use App\Models\Radreply;
use App\Models\UsersRadcheck;
use App\Models\UserWaitingOnChange;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Actions\Users\Customers\Vpn\Credentials\ShowVpnCustomerCredentialsAction;

class ShowUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = Auth::user();

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'user_type' => $user->user_type->type,
            'variable_symbol' => $user->variable_symbol,
            'vpn' => (new ShowVpnCustomerCredentialsAction())->execute($user->id),
            'isWaitingForProductChange' => $this->check_if_customer_waiting_for_product_change($user->id),
            'payments' => $user->payment
        ];
    }

    protected function check_if_customer_waiting_for_product_change(int $userId): bool
    {
        if (UserWaitingOnChange::where('user_id', $userId)->first()) {
            return true;
        } else {
            return false;
        }
    }
}
