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
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property ?Carbon $deleted_at
 * Relationships
 * @property-read Collection|Grant[] $grants
 */
class Category extends Model
{
    use HasFactory, HasUuid, SoftDeletes;

    public $fillable = ['name'];

    public function grants(): HasMany
    {
        return $this->hasMany(Grant::class)->orderByDate();
    }

    public function scopeOrderByName(Builder $query): Builder
    {
        return $query->orderBy('name');
    }
}
