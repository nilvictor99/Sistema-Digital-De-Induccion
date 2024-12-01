<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    /**
     * Determine whether the user can view any permissions.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('Super Admin');
    }

    /**
     * Determine whether the user can view the permission.
     */
    public function view(User $user, $permission): bool
    {
        return $user->hasRole('Super Admin');
    }

    /**
     * Determine whether the user can create permissions.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Super Admin');
    }

    /**
     * Determine whether the user can update the permission.
     */
    public function update(User $user, $permission): bool
    {
        return $user->hasRole('Super Admin');
    }

    /**
     * Determine whether the user can delete the permission.
     */
    public function delete(User $user, $permission): bool
    {
        return $user->hasRole('Super Admin');
    }
}