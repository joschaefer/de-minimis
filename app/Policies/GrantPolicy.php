<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\Grant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class GrantPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): Response|bool
    {
        return $user->can('view any grants');
    }

    public function view(User $user): Response|bool
    {
        return $user->can('view any grants');
    }

    public function create(User $user): Response|bool
    {
        return $user->can('manage grants');
    }

    public function update(User $user): Response|bool
    {
        return $user->can('manage grants');
    }

    public function delete(User $user): Response|bool
    {
        return $user->can('manage grants');
    }
}
