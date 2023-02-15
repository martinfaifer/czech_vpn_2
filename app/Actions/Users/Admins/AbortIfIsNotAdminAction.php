<?php
namespace App\Actions\Users\Admins;

use App\Models\UserType;
use Illuminate\Support\Facades\Auth;

class AbortIfIsNotAdminAction
{
    public function execute()
    {
        if(Auth::user()->user_type->id != UserType::ADMIN) {
            return abort(401);
        }
    }
}
