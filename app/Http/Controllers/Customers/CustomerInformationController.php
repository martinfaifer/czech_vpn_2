<?php

namespace App\Http\Controllers\Customers;

use App\Actions\Users\Customers\CreateCustomerUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerUserRequest;
use App\Http\Resources\ShowUserResource;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class CustomerInformationController extends Controller
{
    public function show(User $user): ShowUserResource
    {
        return new ShowUserResource($user);
    }

    public function create(CreateCustomerUserRequest $request, CreateCustomerUserAction $createCustomerUserAction): Object|array
    {
        return $createCustomerUserAction->execute($request);
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
