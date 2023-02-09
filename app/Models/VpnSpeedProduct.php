<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VpnSpeedProduct extends Model
{
    protected $fillable = [
        'product_name',
        'product_description',
        'product_speed',
        'product_cost'
    ];
}
