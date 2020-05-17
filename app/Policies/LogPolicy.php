<?php

namespace App\Policies;

use Spatie\Activitylog\Models\Activity;
use App\Models\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Traits\PolicyTrait;

class LogPolicy
{
    use HandlesAuthorization, PolicyTrait;

    /**
     * Determine whether the user can view any activities.
     *
     * @param  \App\Models\Entities\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $this->hasAnyPermission($user, ['View Log']);
    }

    /**
     * Determine whether the user can view the activity.
     *
     * @param  \App\Models\Entities\User  $user
     * @param  \Spatie\Activitylog\Models\Activity  $activity
     * @return mixed
     */
    public function view(User $user, Activity $activity)
    {
        return $this->hasPermission($user, 'View Log');
    }
 
}
