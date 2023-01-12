<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radgroupreply extends Model
{
    /**
     *  This contains speed profiles which we returns to vpn server for specific user profile
     */

    protected $table = 'radgroupreply';

    protected $fillable = [
        'groupname',
        'attribute',
        'op',
        'value'
    ];
}
