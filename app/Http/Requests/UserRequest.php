<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $last_name
 * @property string $first_name
 * @property string $email
 * @property ?string $role_id
 */
class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'last_name' => ['required', 'max:100'],
            'first_name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->user?->id],
            'role_id' => ['nullable', 'exists:roles,id'],
        ];
    }
}
