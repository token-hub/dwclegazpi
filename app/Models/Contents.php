<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    protected $fillable = [
        'title', 'text', 'type_id', 'user_id'
    ];
}
