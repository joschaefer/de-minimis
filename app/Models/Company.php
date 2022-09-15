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
use Illuminate\Support\Facades\URL;

/**
 * @property string $id
 * @property string $name
 * @property ?Carbon $founded_at
 * @property ?string $register_court
 * @property ?string $register_number
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

    public $fillable = ['name', 'founded_at', 'register_court', 'register_number'];

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

    public function getReportAttribute(): string
    {
        $to = $this->contacts->pluck('email')->join(',');
        $query = [
            'subject' => __('De-minimis report for :company', ['company' => $this->name]),
            'body' => __("Hi :names,\n\nYou can view the current de-minimis grants for :company at any time by clicking on the following link:\n\n:link\n\nBest regards,\n:name", [
                'names' => $this->contacts->pluck('first_name')->join(', hi '),
                'company' => $this->name,
                'link' => URL::signedRoute('grants.preview', ['company' => $this]),
                'name' => auth()->user()->first_name,
            ]),
        ];

        return sprintf('mailto:%s?%s', $to, http_build_query($query, '', null, PHP_QUERY_RFC3986));
    }
}
