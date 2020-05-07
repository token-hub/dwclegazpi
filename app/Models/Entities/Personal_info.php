<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;
use App\Traits\LogsConfiguration;

class Personal_info extends Model
{   
     use logsActivity, LogsConfiguration;
	 /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
     
    protected static $logName = 'user information';

    protected $fillable = [
        'firstname', 'lastname', 'gender', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getFirstnameAttribute($data) {
    	return ucfirst($data);
    }

    public function getLastnameAttribute($data) {
    	return ucfirst($data);
    }

    public function getGenderAttribute($data) {
        return ucfirst($data);
    }
}
