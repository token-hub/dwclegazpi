<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{

	protected static $logName = 'slide';

    protected $fillable = [
        'is_active', 'number'
    ];

    public function image() 
    {
    	return $this->morphOne(Image::class, 'imageable');
    }
}
