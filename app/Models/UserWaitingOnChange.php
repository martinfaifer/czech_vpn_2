<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserWaitingOnChange extends Model
{
    protected $fillable = [
        'user_id',
        'vpn_speed_products_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function vpn_speed_product(): BelongsTo
    {
        return $this->belongsTo(VpnSpeedProduct::class, 'vpn_speed_products_id', 'id');
    }
}
