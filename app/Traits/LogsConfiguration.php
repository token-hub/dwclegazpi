<?php

namespace App\Traits;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Contracts\Activity;

trait LogsConfiguration
{ 
	use logsActivity, CausesActivity;

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    protected static $ignoreChangedAttributes = ['updated_at', 'remember_token', 'email_verified_at'];
    protected static $logAttributesToIgnore = ['updated_at', 'remember_token', 'email_verified_at'];

   public function tapActivity(Activity $activity, string $eventName)
    {
        // $activity->description = "activity.logs.message.{$eventName}";
    }
}