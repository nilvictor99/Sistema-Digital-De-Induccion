<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ToolType;
use App\Models\User;

class ToolTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ToolType');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ToolType $tooltype): bool
    {
        return $user->checkPermissionTo('view ToolType');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ToolType');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ToolType $tooltype): bool
    {
        return $user->checkPermissionTo('update ToolType');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ToolType $tooltype): bool
    {
        return $user->checkPermissionTo('delete ToolType');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any ToolType');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ToolType $tooltype): bool
    {
        return $user->checkPermissionTo('restore ToolType');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any ToolType');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, ToolType $tooltype): bool
    {
        return $user->checkPermissionTo('replicate ToolType');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder ToolType');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ToolType $tooltype): bool
    {
        return $user->checkPermissionTo('force-delete ToolType');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any ToolType');
    }
}
