<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	 /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

    protected $fillable = [
        'image_name', 'is_active', 'number',
    ];
}
