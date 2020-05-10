<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected static $logName = 'role';

    protected $fillable = ['title'];

    # relationship to users table
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    # relationship to permissions table
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
