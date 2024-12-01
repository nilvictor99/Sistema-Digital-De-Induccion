<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any roles.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('Super Admin');
    }

    /**
     * Determine whether the user can view the role.
     */
    public function view(User $user, $role): bool
    {
        return $user->hasRole('Super Admin');
    }

    /**
     * Determine whether the user can create roles.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Super Admin');
    }

    /**
     * Determine whether the user can update the role.
     */
    public function update(User $user, $role): bool
    {
        return $user->hasRole('Super Admin');
    }

    /**
     * Determine whether the user can delete the role.
     */
    public function delete(User $user, $role): bool
    {
        return $user->hasRole('Super Admin');
    }

}
