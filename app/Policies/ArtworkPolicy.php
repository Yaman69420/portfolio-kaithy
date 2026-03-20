<?php

namespace App\Policies;

use App\Models\Artwork;
use App\Models\User;

class ArtworkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Artwork $artwork): bool
    {
        return $artwork->is_published || ($user && $user->is_admin);
    }

    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    public function update(User $user, Artwork $artwork): bool
    {
        return $user->is_admin;
    }

    public function delete(User $user, Artwork $artwork): bool
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Artwork $artwork): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Artwork $artwork): bool
    {
        return false;
    }
}
