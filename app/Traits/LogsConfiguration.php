<?php

namespace App\Traits;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;

trait LogsConfiguration
{ 
	use logsActivity;

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;
    protected static $ignoreChangedAttributes = ['updated_at', 'remember_token', 'email_verified_at'];

	 public function tapActivity(Activity $activity, string $eventName)
    {   
        $activity->description = "A ".Static::$logName." was {$eventName}.";
        $activity->properties = $activity->properties->put('user_id', $activity->relations['subject']->user_id);
    }
}