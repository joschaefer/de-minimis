<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property string $id
 * @property string $last_name
 * @property string $first_name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property ?Carbon $deleted_at
 * @property-read string $name
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasUuid, Notifiable, TwoFactorAuthenticatable, HasRoles;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'password',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute(): string
    {
        return $this->last_name . ', ' . $this->first_name;
    }

    public function setEmailAttribute(string $value)
    {
        $this->attributes['email'] = Str::lower($value);
    }

    public function grants(): HasMany
    {
        return $this->hasMany(Grant::class)->orderByDate();
    }

    public function scopeOrderByName(Builder $query): Builder
    {
        return $query->orderBy('last_name')->orderBy('first_name');
    }
}
