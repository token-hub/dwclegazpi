<?php
namespace App\Traits;

use App\Models\User;
use Spatie\Activitylog\Models\Activity;

trait LogTrait
{
    public function log($supfix = 'in') {
    	$user = User::find(auth()->user()->id);
        
        activity('login/logout')
       ->causedBy($user)
       ->log('A user logs '.$supfix);
    }
}