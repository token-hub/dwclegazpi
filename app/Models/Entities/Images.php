<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;
use App\Traits\LogsConfiguration;

class Images extends Model
{
     use logsActivity, LogsConfiguration;
	 /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
     
    protected static $logName = 'slider image';

    protected static $logAttributesToIgnore = ['is_active', 'number'];

    protected $fillable = [
        'image_name', 'is_active', 'number',
    ];
}
