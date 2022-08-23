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
        return true;
    }

    public function view(User $user, Grant $grant): Response|bool
    {
        return true;
    }

    public function create(User $user, ?Company $company = null): Response|bool
    {
        return true;
    }

    public function update(User $user, Grant $grant): Response|bool
    {
        return true;
    }

    public function delete(User $user, Grant $grant): Response|bool
    {
        return true;
    }
}
