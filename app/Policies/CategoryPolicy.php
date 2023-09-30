<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): Response|bool
    {
        return $user->can('manage categories');
    }

    public function view(User $user): Response|bool
    {
        return $user->can('manage categories');
    }

    public function create(User $user): Response|bool
    {
        return $user->can('manage categories');
    }

    public function update(User $user): Response|bool
    {
        return $user->can('manage categories');
    }

    public function delete(User $user): Response|bool
    {
        return $user->can('manage categories');
    }
}
