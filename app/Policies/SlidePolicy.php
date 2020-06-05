<?php

namespace App\Policies;

use App\Models\Entities\Slide;
use App\Models\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Traits\PolicyTrait;

class slidePolicy
{
    use HandlesAuthorization, PolicyTrait;

    // --- [ ACTIVE SLIDES ] ---

    public function viewAnyActive(User $user)
    {
        return $this->hasAnyPermission($user, ['update active slide', 'delete active slide']);
    }

    public function updateActive(User $user, Slide $slide)
    {
        return $this->hasPermission($user, ['update active slide']);
    }   

    public function deleteActive(User $user, Slide $slide)
    {
        return $this->hasPermission($user, ['delete active slide']);
    }

    // --- [ INACTIVE SLIDES ] ---

    public function viewAnyInactive(User $user)
    {
        return $this->hasAnyPermission($user, ['add inactive slide', 'update inactive slide', 'delete inactive slide']);
    }

    public function createInactive(User $user)
    {
        return $this->hasPermission($user, ['add inactive slide']);
    }

    public function updateInactive(User $user, Slide $slide)
    {
        return $this->hasPermission($user, ['update inactive slide']);
    }

    public function deleteInactive(User $user, Slide $slide)
    {
        return $this->hasPermission($user, ['delete inactive slide']);
    }
}
