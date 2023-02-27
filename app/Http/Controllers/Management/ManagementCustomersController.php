<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Models\WaitingOnDelete;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DeleteCustomerRequest;
use App\Http\Resources\IndexManagementCustomersResource;
use App\Models\User;

class ManagementCustomersController extends Controller
{
    public function index()
    {
        return new IndexManagementCustomersResource(Auth::user());
    }

    public function show()
    {
        //
    }

    public function store()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy(User $user)
    {

        if (Auth::user()->isp_id != $user->isp_id) {
            return abort(401);
        }

        try {
            WaitingOnDelete::create([
                'user_id' => $user->id
            ]);

            return $this->success_response("Přidáno do fronty k odebrání");
        } catch (\Throwable $th) {
            return $this->error_response("Uživatel již je ve frontě k odebrání");
        }
    }
}
