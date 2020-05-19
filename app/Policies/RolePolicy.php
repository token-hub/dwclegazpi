<?php

namespace App\Policies;

use App\Models\Entities\User;
use App\Models\Entities\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Traits\PolicyTrait;

class RolePolicy
{
    use HandlesAuthorization, PolicyTrait;

    /**
     * Determine whether the user can view any roles.
     *
     * @param  \App\Models\Entities\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
       return $this->hasAnyPermission($user, ['add role', 'update role', 'delete role']);
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
       //
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\Models\Entities\User  $user
     * @return mixed
     */
    public function create(User $user)
    {   
        return $this->hasPermission($user, 'add role');
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {   
        return $this->hasPermission($user, 'update role');
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $this->hasPermission($user, 'delete role');
    }

    /**
     * Determine whether the user can restore the role.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the role.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
