<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogRecord extends Model
{
    protected $fillable = [
        'user_id',
        'log',
    ];
}
