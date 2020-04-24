<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class User_access extends Model
{
    protected $fillable = [
        'user_access', 'user_id'
    ];

    public function user() {
    	return $this->belongsTo('App\Models\User');
    }

    public function getUserAccessAttribute($data) {
    	return ucfirst($data);
    }
}
