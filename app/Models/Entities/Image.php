<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image_name', 'imageable_id', 'imageable_type'
    ];

    public function imageable()
    {
    	return $this->morphTo();
    }
}
