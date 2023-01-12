<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Radgroupcheck extends Model
{

    /**
     * This contains speed profiles for vpn connection
     */

    protected $table = 'radgroupcheck';

    protected $fillable = [
        'groupname',
        'attribute',
        'op',
        'value'
    ];

}
