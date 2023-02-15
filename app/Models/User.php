<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Paddle\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type_id',
        'variable_symbol',
        'product_id',
        'is_deleted',
        'isp_id'
    ];

    public function vpn_product(): BelongsTo
    {
        return $this->belongsTo(VpnSpeedProduct::class, 'product_id');
    }

    public function is_waiting_for_payment(): BelongsTo
    {
        return $this->belongsTo(UserWaitingOnChange::class, 'user_id', 'id');
    }

    public function payment(): HasMany
    {
        return $this->hasMany(CustomerPayments::class, 'user_id', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_deleted' => 'boolean'
    ];

    public function user_type(): BelongsTo
    {
        return $this->belongsTo(UserType::class, 'user_type_id', 'id');
    }

    public function vpns(): HasMany
    {
        return $this->hasMany(UsersRadcheck::class, 'user_id', 'id');
    }
}
