<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{

	protected static $logName = 'web update';

    protected $fillable = [
        'day', 'month', 'title', 'clickable', 'overview', 'category', 'paragraph'
    ];

    public function image() 
    {
    	return $this->morphMany(Image::class, 'imageable');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
