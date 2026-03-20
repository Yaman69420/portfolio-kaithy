<?php

namespace App\Policies;

use App\Models\ContactMessage;
use App\Models\User;

class ContactMessagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->is_admin;
    }

    public function view(User $user, ContactMessage $contactMessage): bool
    {
        return $user->is_admin;
    }

    public function create(?User $user): bool
    {
        return true;
    }

    public function update(User $user, ContactMessage $contactMessage): bool
    {
        return $user->is_admin;
    }

    public function delete(User $user, ContactMessage $contactMessage): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ContactMessage $contactMessage): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ContactMessage $contactMessage): bool
    {
        return false;
    }
}
