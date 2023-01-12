<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Radusergroup extends Model
{

    /**
     * Basic definition speed profiles
     */

    protected $table = 'radusergroup';

    protected $fillable = [
        'username',
        'groupname',
        'priority'
    ];
}
