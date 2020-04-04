<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $fillable = [
        'name', 'is_active', 'number'
    ];

    public function user() {
    	return $this->belongsTo('App\Models\User');
    }

    public function getNameAttribute($data) {
    	return ucfirst($data);
    }
}
