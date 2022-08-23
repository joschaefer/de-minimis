<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ContactPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): Response|bool
    {
        return true;
    }

    public function view(User $user, Contact $contact): Response|bool
    {
        return true;
    }

    public function create(User $user, Company $company): Response|bool
    {
        return true;
    }

    public function update(User $user, Contact $contact): Response|bool
    {
        return true;
    }

    public function delete(User $user, Contact $contact): Response|bool
    {
        return true;
    }
}
