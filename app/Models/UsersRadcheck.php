<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsersRadcheck extends Model
{
    protected $fillable = [
        'user_id', 'radcheck_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function radcheck(): BelongsTo
    {
        return $this->belongsTo(Radcheck::class, 'radcheck_id', 'id');
    }
}
