<?php

namespace App\Models\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsConfiguration;
use App\Exceptions\UserNameIsBanned;

class User extends Authenticatable implements MustVerifyEmail
{   
    use Notifiable, LogsConfiguration;

    protected static $logName = 'user account';

    protected static $ignoreChangedAttributes = ['updated_at', 'remember_token', 'email_verified_at'];
    
    protected static $logAttributesToIgnore = ['updated_at', 'remember_token', 'email_verified_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'username', 'password', 'email', 'is_active', 'remember_token', 'email_verified_at'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    # overwrite the email verification
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmailQueued);
    }
    
    # relationship to roles table
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    # relationship to personal_info table
    public function personal_info() 
    {
        return $this->hasOne(Personal_info::class, 'user_id'); 
    }

    # relationship to Department table
    public function department() 
    {
        return $this->hasOne(Department::class, 'user_id'); 
    }

    # relationship to updates table
    public function updates() 
    {
        return $this->hasOne(Update::class, 'user_id'); 
    }

    public function getIsActiveAttribute($data) 
    {
        return $data == 0 ? 'Inactive' : 'Active';
    }

    public function setIsActiveAttribute($data) 
    {
        $this->attributes['is_active'] =  $data == 'Inactive' ? 0 : 1;
    }
}
