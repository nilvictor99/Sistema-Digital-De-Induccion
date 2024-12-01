<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ToolCategory;
use App\Models\User;

class ToolCategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ToolCategory');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ToolCategory $toolcategory): bool
    {
        return $user->checkPermissionTo('view ToolCategory');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ToolCategory');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ToolCategory $toolcategory): bool
    {
        return $user->checkPermissionTo('update ToolCategory');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ToolCategory $toolcategory): bool
    {
        return $user->checkPermissionTo('delete ToolCategory');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any ToolCategory');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ToolCategory $toolcategory): bool
    {
        return $user->checkPermissionTo('restore ToolCategory');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any ToolCategory');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, ToolCategory $toolcategory): bool
    {
        return $user->checkPermissionTo('replicate ToolCategory');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder ToolCategory');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ToolCategory $toolcategory): bool
    {
        return $user->checkPermissionTo('force-delete ToolCategory');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any ToolCategory');
    }
}
