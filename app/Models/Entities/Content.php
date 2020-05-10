<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    protected $fillable = [
        'title', 'text', 'type_id', 'user_id'
    ];
}
