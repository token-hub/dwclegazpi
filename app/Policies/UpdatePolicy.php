<?php

namespace App\Policies;

use App\Models\Entities\User;
use App\Models\Entities\Update;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Traits\PolicyTrait;

class UpdatePolicy
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
        return $this->hasAnyPermission($user, ['add updates', 'update updates', 'delete updates']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user, Update $model)
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
        return $this->hasPermission($user, 'add updates');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, Update $model)
    {
        return $this->hasPermission($user, 'update updates');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, Update $model)
    {
        return $this->hasPermission($user, 'delete updates');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, Update $model)
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
    public function forceDelete(User $user, Update $model)
    {
        //
    }
}
