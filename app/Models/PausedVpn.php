<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PausedVpn extends Model
{
    protected $fillable = [
        'user_id', 'payload'
    ];
}
