<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): Response|bool
    {
        return true;
    }

    public function view(User $user, Category $category): Response|bool
    {
        return false;
    }

    public function create(User $user): Response|bool
    {
        return true;
    }

    public function update(User $user, Category $category): Response|bool
    {
        return false;
    }

    public function delete(User $user, Category $category): Response|bool
    {
        return false;
    }
}
