<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

/**
 * @property string $name
 * @property Carbon $founded_at
 * @property string $register_court
 * @property string $register_number
 * @property string[] $last_names
 * @property string[] $first_names
 * @property string[] $emails
 */
class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255|unique:companies',
            'founded_at' => 'nullable|date',
            'register_court' => 'nullable|max:255',
            'register_number' => 'nullable|max:100',
            'last_names' => 'array|min:1',
            'last_names.*' => 'max:100',
            'first_names' => 'array|min:1',
            'first_names.*' => 'max:100',
            'emails' => 'array|min:1',
            'emails.*' => 'email|max:255',
        ];
    }
}
