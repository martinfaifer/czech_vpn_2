<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Nas extends Model
{
    protected $fillable = [
        'nasname', 'shortname', 'type', 'ports', 'secret', 'server', 'community', 'description'
    ];
}
