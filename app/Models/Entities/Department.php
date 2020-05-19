<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsConfiguration;

class Department extends Model
{	
	use LogsConfiguration;

	protected static $logName = 'user department information';

    protected static $ignoreChangedAttributes = ['created_at'];

    protected $fillable = [
        'department_name', 'user_id'
    ];

    public function users() {
    	return $this->belongsTo(User::class);
    }

    public function getDepartmentNameAttribute($data) 
    {
    	return ucfirst($data);
    }
}
