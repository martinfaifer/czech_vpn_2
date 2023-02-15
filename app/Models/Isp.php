<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Isp extends Model
{
    protected $fillable = [
        'isp_name',
        'ic',
        'dic'
    ];
}
