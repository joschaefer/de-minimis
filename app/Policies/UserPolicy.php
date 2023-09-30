<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('manage users');
    }

    public function create(User $user): bool
    {
        return $user->can('manage users');
    }

    public function update(User $user): bool
    {
        return $user->can('manage users');
    }

    public function delete(User $user): bool
    {
        return $user->can('manage users');
    }
}
