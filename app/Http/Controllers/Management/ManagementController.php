<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManagementController extends Controller
{
    public function show()
    {
        return Auth::user();
    }
}
