<?php

namespace App\Http\Controllers\Management;

use App\Http\Resources\ShowManagementCustomersCountResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManagementCustomersCountController extends Controller
{
    public function __invoke()
    {
        return new ShowManagementCustomersCountResource(Auth::user());
    }
}
