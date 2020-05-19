<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsConfiguration;

class Role extends Model
{
    use LogsConfiguration;

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

    public function getTitleAttribute($data) 
    {
        return ucfirst($data);
    }
}
