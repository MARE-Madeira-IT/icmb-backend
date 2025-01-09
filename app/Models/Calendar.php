<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        "title",
        "date",
        "from",
        "to",
        "room",
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_calendars', 'calendar_id', 'user_id');
    }
}
