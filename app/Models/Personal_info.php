<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal_info extends Model
{
	 /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
    protected $fillable = [
        'name', 'username', 'gender', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function getFirstnameAttribute($data) {
    	return ucfirst($data);
    }

    public function getLastnameAttribute($data) {
    	return ucfirst($data);
    }

    public function getGenderAttribute($data) {
        return ucfirst($data);
    }
}
