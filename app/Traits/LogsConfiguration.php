<?php

namespace App\Traits;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Contracts\Activity;
use App\Models\User;

trait LogsConfiguration
{ 
	use logsActivity, CausesActivity;

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $ignoreChangedAttributes = ['updated_at', 'remember_token', 'email_verified_at'];

	 public function tapActivity(Activity $activity, string $eventName)
    {   
    	$user_id = 0;

    	// check if the subject table is users
    	if ($activity->relations['subject']->table == 'users') {
    		$user_id = $activity->relations['subject']->id;
    	} else {
    		$user_id = $activity->relations['subject']->user_id;
    	}

    	$username = User::find($user_id)->username;

        $activity->description = "A ".Static::$logName." was {$eventName}.";
        $activity->properties = $activity->properties->put('toUsername', $username);
    }
}