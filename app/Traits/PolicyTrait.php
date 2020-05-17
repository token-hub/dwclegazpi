<?php

namespace App\Traits;

use App\Models\Entities\Role;
use App\Models\Entities\Permission;

trait PolicyTrait
{
     public function hasPermission($user, $permissions)
    {   
        # get permission id
        $permissionsId = Permission::where('title', $permissions)->pluck('id')->toArray();

        # get user permissions id
        $userPermission = $user->roles
                        ->flatmap(function($role){
                            return [Role::find($role->id)->permissions->pluck('id')->toArray()];
                        })->flatmap(function($role){
                            return !empty($role) ? $role :'';
                        })->toArray();

        # check if user has permissions to access
        return count(array_intersect($permissionsId, $userPermission)) > 0;
    }

    public function hasAnyPermission($user, $permissions)
    {
        # get permission id
        $permissionsId = Permission::whereIn('title', $permissions)->pluck('id')->toArray();

         # get user permissions id
        $userPermission = $user->roles
                        ->flatmap(function($role){
                            return [Role::find($role->id)->permissions->pluck('id')->toArray()];
                        })->flatmap(function($role){
                            return !empty($role) ? $role :'';
                        })->toArray();
                        
        # check if user has permissions to access
        return count(array_intersect($permissionsId, $userPermission)) > 0;
    }
}