<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $fillable = [
        'user_id', 'content_id', 'log_type_id'
    ];
}
