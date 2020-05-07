<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected static $logName = 'permission';

    protected $fillable = ['title'];

    # relationship to roles table
    public function roles() 
    {
    	return $this->belongsToMany(Roles::class, 'role_permission', 'permission_id', 'role_id')->withTimestamps();
    }
}
