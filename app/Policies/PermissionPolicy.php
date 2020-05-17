<?php

namespace App\Policies;

use App\Models\Entities\Permission;
use App\Models\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Traits\PolicyTrait;

class PermissionPolicy
{
    use HandlesAuthorization, PolicyTrait;

    /**
     * Determine whether the user can view any permissions.
     *
     * @param  \App\Models\Entities\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $this->hasAnyPermission($user, ['Add Permission', 'Update Permission', 'Delete Permission']);
    }

    /**
     * Determine whether the user can view the permission.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\Models\Entities\Permission  $permission
     * @return mixed
     */
    public function view(User $user, Permission $permission)
    {
        //
    }

    /**
     * Determine whether the user can create permissions.
     *
     * @param  \App\Models\Entities\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->hasPermission($user, ['Add Permission']);
    }

    /**
     * Determine whether the user can update the permission.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\Models\Entities\Permission  $permission
     * @return mixed
     */
    public function update(User $user, Permission $permission)
    {
        return $this->hasPermission($user, ['Update Permission']);
    }

    /**
     * Determine whether the user can delete the permission.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\Models\Entities\Permission  $permission
     * @return mixed
     */
    public function delete(User $user, Permission $permission)
    {
        return $this->hasPermission($user, ['Delete Permission']);
    }

    /**
     * Determine whether the user can restore the permission.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\Models\Entities\Permission  $permission
     * @return mixed
     */
    public function restore(User $user, Permission $permission)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the permission.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\Models\Entities\Permission  $permission
     * @return mixed
     */
    public function forceDelete(User $user, Permission $permission)
    {
        //
    }
}
