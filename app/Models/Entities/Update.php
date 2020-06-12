<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LogsConfiguration;

class Update extends Model
{
    use LogsConfiguration;

	protected static $logName = 'web update';

    protected static $logAttributesToIgnore = ['clickable', 'paragraph'];

    protected $fillable = [
        'title', 'clickable', 'overview', 'category', 'paragraph'
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
