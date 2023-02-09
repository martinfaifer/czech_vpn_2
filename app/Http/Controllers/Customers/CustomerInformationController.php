<?php

namespace App\Http\Controllers\Customers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Cast\Object_;
use App\Http\Resources\ShowUserResource;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Requests\CreateCustomerUserRequest;
use App\Actions\Users\Customers\UpdateCustomerAction;
use App\Actions\Users\Customers\CreateCustomerUserAction;
use App\Actions\Users\Customers\DeleteCustomeruserAction;
use Illuminate\Support\Facades\Auth;

class CustomerInformationController extends Controller
{
    public function show(): ShowUserResource
    {
        return new ShowUserResource([]);
    }

    public function create(CreateCustomerUserRequest $request, CreateCustomerUserAction $createCustomerUserAction): Object|array
    {
        return $createCustomerUserAction->execute($request);
    }

    public function update(UpdateCustomerRequest $request, User $user, UpdateCustomerAction $updateCustomerAction)
    {
        return $updateCustomerAction->execute($user, $request) == true
            ? $this->success_response("Upraveno")
            : $this->error_response("Nepodařilo se provést změny");
    }

    public function destroy(DeleteCustomeruserAction $deleteCustomeruserAction)
    {
        $user = Auth::user();

        return $deleteCustomeruserAction->execute($user) == true
            ? $this->success_response("Odebráno")
            : $this->error_response("Nepodařilo se odebrat");
    }
}
