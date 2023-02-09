<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeleteUser extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'variable_symbol',
        'vpn_data'
    ];
}
