<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsConfiguration;

class Permission extends Model
{
	use LogsConfiguration;

    protected static $logName = 'permission';

    protected $fillable = ['title'];

    # relationship to roles table
    public function roles() 
    {
    	return $this->belongsToMany(Roles::class)->withTimestamps();
    }

    public function getTitleAttribute($data)
    {
    	return ucfirst($data);
    }
}
