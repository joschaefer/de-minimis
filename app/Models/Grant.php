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
 * @property string $description
 * @property float $amount
 * @property string $amount_formatted
 * @property Carbon $start
 * @property ?Carbon $end
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property ?Carbon $deleted_at
 * Relationships
 * @property-read ?Category $category
 * @property-read Company $company
 * @property-read User $createdBy
 */
class Grant extends Model
{
    use HasFactory, HasUuid, SoftDeletes;

    public $fillable = ['description', 'value', 'start', 'end', 'category_id'];

    public $casts = [
        'value' => 'decimal:2',
        'start' => 'date:Y-m-d',
        'end' => 'date:Y-m-d',
    ];

    public function isPeriod(): bool
    {
        return $this->end !== null;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function getAmountFormattedAttribute(): string
    {
        return number_format($this->amount, 2) . ' ' . config('app.currency');
    }

    public function scopeOrderByDate(Builder $query): Builder
    {
        return $query->orderByDesc('start')->orderByDesc('end');
    }
}
