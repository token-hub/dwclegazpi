<?php

namespace App\Policies;

use App\Models\Entities\User;
use App\Models\Entities\Role;
use App\Models\Entities\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any roles.
     *
     * @param  \App\Models\Entities\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
       return $this->hasAnyRolePermission($user, ['Add Role', 'Update Role', 'Delete Role']);
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
        return $this->hasRolePermission($user, 'Add Role');
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
        return $this->hasRolePermission($user, 'Update Role');
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
        return $this->hasRolePermission($user, 'Delete Role');
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

    public function hasRolePermission($user, $roleTitle)
    {
        # get role permission id
        $rolePermissionId = Permission::where('title', $roleTitle)->first()->id;
        
        # compare role permissions id to user role/s permission id
        return $user->roles
                ->flatmap(function($role) use ($rolePermissionId) {
                    return [Role::find($role->id)->first()->permissions->contains($rolePermissionId)];
                })->toArray();
    }

    public function hasAnyRolePermission($user, $roleTitle)
    {
        # get role permissions id
        $rolePermissionsId = Permission::whereIn('title', $roleTitle)->pluck('id')->toArray();

        # compare role permissions id to user role/s permission id 
        return $user->roles
                    ->flatmap(function($role) use ($rolePermissionsId) {
                        foreach ($rolePermissionsId as $rpi) {
                            return [Role::find($role->id)->first()->permissions->contains($rpi)];
                        }
                    })->toArray();
    }
}
