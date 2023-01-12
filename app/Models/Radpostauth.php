<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radpostauth extends Model
{
    protected $table = 'radpostauth';

    protected $fillable = [
        'username',
        'pass',
        'reply',
        'authdate'
    ];
}
