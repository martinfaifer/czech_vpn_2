<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{

    const ADMIN = 1;
    const CUSTOMER = 2;

    protected $fillable = [
        'type'
    ];
}
