<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

/**
 * @property string $description
 * @property float $amount
 * @property Carbon $start
 * @property ?Carbon $end
 * @property string $category_id
 * @property string $company_id
 */
class GrantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $company = $this->company ?? $this->grant->company;

        $rules = [
            'description' => 'required|max:255',
            'amount' => 'required|numeric',
            'start' => 'required|date:Y-m-d',
            'end' => 'nullable|date:Y-m-d|after:start',
            'category_id' => 'required|exists:categories,id',
        ];

        $rules += is_null($company)
            ? ['company_id' => 'required|exists:companies,id']
            : ['company_id' => 'sometimes|in:' . $company->id];

        return $rules;
    }
}
