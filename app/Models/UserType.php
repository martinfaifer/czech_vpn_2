<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{

    const ADMIN = 1;
    const CUSTOMER = 2;

    const GENERATE_BY_API = 3;

    protected $fillable = [
        'type'
    ];
}
