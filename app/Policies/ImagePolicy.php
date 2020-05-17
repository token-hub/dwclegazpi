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
        return $this->hasAnyPermission($user, ['Update Active Image', 'Delete Active Image']);
    }

    public function updateActive(User $user, Image $image)
    {
        return $this->hasPermission($user, ['Update Active Image']);
    }   

    public function deleteActive(User $user, Image $image)
    {
        return $this->hasPermission($user, ['Delete Active Image']);
    }

    // --- [ INACTIVE IMAGES ] ---

    public function viewAnyInactive(User $user)
    {
        return $this->hasAnyPermission($user, ['Add Inactive Image', 'Update Inactive Image', 'Delete Inactive Image']);
    }

    public function createInactive(User $user)
    {
        return $this->hasPermission($user, ['Add Inactive Image']);
    }

    public function updateInactive(User $user, Image $image)
    {
        return $this->hasPermission($user, ['Update Inactive Image']);
    }

    public function deleteInactive(User $user, Image $image)
    {
        return $this->hasPermission($user, ['Delete Inactive Image']);
    }
}
