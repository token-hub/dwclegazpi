<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected static $logName = 'permission';

    protected $fillable = ['title'];

    # relationship to roles table
    public function roles() 
    {
    	return $this->belongsToMany(Roles::class)->withTimestamps();
    }
}
