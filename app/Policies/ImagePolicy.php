<?php

namespace App\Policies;

use App\Models\Entities\Image;
use App\Models\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Traits\PolicyTrait;

class ImagePolicy
{
    use HandlesAuthorization, PolicyTrait;

    // --- [ ACTIVE IMAGES ] ---

    public function viewAnyActive(User $user)
    {
        return $this->hasAnyPermission($user, ['update active image', 'delete active image']);
    }

    public function updateActive(User $user, Image $image)
    {
        return $this->hasPermission($user, ['update active image']);
    }   

    public function deleteActive(User $user, Image $image)
    {
        return $this->hasPermission($user, ['delete active image']);
    }

    // --- [ INACTIVE IMAGES ] ---

    public function viewAnyInactive(User $user)
    {
        return $this->hasAnyPermission($user, ['add inactive image', 'update inactive image', 'delete inactive image']);
    }

    public function createInactive(User $user)
    {
        return $this->hasPermission($user, ['add inactive image']);
    }

    public function updateInactive(User $user, Image $image)
    {
        return $this->hasPermission($user, ['update inactive image']);
    }

    public function deleteInactive(User $user, Image $image)
    {
        return $this->hasPermission($user, ['delete inactive image']);
    }
}
