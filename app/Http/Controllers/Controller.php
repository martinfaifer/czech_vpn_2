<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function success_response(string $message): array
    {
        return [
            'status' => "success",
            'message' => $message
        ];
    }


    public function error_response(string $message): array
    {
        return [
            'status' => 'error',
            'message' => $message
        ];
    }
}
