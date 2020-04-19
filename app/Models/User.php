<?php

namespace App\Models;

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email', 'is_active'
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
    /**
     * Send the email verification notification.
     *
     * @return void
     */
    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new \App\Notifications\Auth\VerifyEmail);
    // }
    
    # relationship to personal_info table
    public function personal_info() {
        return $this->hasOne('App\Models\Personal_info', 'user_id'); 
    }

    # relationship to departments table
    public function departments() {
        return $this->hasOne('App\Models\Departments', 'user_id'); 
    }

    # relationship to user_access table
    public function user_access() {
        return $this->hasOne('App\Models\User_access', 'user_id'); 
    }

    public function getIsActiveAttribute($data) {
        return $data == 0 ? 'Inactive' : 'Active';
    }


}
