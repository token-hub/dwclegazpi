<?php

namespace App\Policies;

use App\Models\Entities\User;
use App\Models\Entities\Role;
use App\Models\Entities\Permission;
use App\Traits\PolicyTrait;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization, PolicyTrait;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Entities\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $this->hasAnyPermission($user, ['Add User', 'Update User', 'Delete User']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Entities\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->hasPermission($user, 'Add User');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $this->hasPermission($user, 'Update User');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $this->hasPermission($user, 'Delete User');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
