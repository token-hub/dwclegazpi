<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
	protected static $logName = 'role';

    protected $fillable = ['title'];

    # relationship to users table
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role', 'role_id', 'user_id')->withTimestamps();
    }

    # relationship to permissions table
    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'role_permission', 'role_id', 'permission_id')->withTimestamps();
    }
}
