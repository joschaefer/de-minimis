<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property string $id
 * @property string $name
 * @property ?Carbon $founded_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property ?Carbon $deleted_at
 * Relationships
 * @property-read Collection|Contact[] $contacts
 * @property-read Collection|Grant[]   $grants
 */
class Company extends Model
{
    use HasFactory, HasUuid, SoftDeletes;

    public $fillable = ['name', 'founded_at'];

    public $casts = [
        'founded_at' => 'date:Y-m-d',
    ];

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class)->orderByName();
    }

    public function grants(): HasMany
    {
        return $this->hasMany(Grant::class)->orderByDate();
    }

    public function scopeOrderByName(Builder $query): Builder
    {
        return $query->orderBy('name');
    }
}
