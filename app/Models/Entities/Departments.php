<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsConfiguration;

class Departments extends Model
{	

	use LogsConfiguration;

	protected static $logName = 'user department information';

    protected $fillable = [
        'department_name', 'user_id'
    ];

    public function user() {
    	return $this->belongsTo('App\Models\User');
    }

    public function getNameAttribute($data) {
    	return ucfirst($data);
    }
}
