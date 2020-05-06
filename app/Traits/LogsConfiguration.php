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
}