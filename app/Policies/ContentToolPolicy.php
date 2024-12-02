<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ContentTool;
use App\Models\User;

class ContentToolPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ContentTool');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ContentTool $contenttool): bool
    {
        return $user->checkPermissionTo('view ContentTool');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ContentTool');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ContentTool $contenttool): bool
    {
        return $user->checkPermissionTo('update ContentTool');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ContentTool $contenttool): bool
    {
        return $user->checkPermissionTo('delete ContentTool');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any ContentTool');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ContentTool $contenttool): bool
    {
        return $user->checkPermissionTo('restore ContentTool');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any ContentTool');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, ContentTool $contenttool): bool
    {
        return $user->checkPermissionTo('replicate ContentTool');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder ContentTool');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ContentTool $contenttool): bool
    {
        return $user->checkPermissionTo('force-delete ContentTool');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any ContentTool');
    }
}
