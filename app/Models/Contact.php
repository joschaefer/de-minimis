<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property string $id
 * @property string $last_name
 * @property string $first_name
 * @property string $email
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property ?Carbon $deleted_at
 * @property-read string $name
 * Relationships
 * @property-read Company $company
 */
class Contact extends Model
{
    use HasFactory, HasUuid, SoftDeletes;

    public $fillable = ['last_name', 'first_name', 'email'];

    public function getNameAttribute(): string
    {
        return $this->last_name . ', ' . $this->first_name;
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeOrderByName(Builder $query): Builder
    {
        return $query->orderBy('last_name')->orderBy('first_name');
    }
}
