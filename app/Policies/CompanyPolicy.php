<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): Response|bool
    {
        return $user->can('view any company');
    }

    public function view(User $user): Response|bool
    {
        return $user->can('view any company');
    }

    public function create(User $user): Response|bool
    {
        return $user->can('manage companies');
    }

    public function update(User $user): Response|bool
    {
        return $user->can('manage companies');
    }

    public function delete(User $user): Response|bool
    {
        return $user->can('manage companies');
    }
}
