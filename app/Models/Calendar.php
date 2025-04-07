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

    protected $hidden = [
        "users"
    ];

    public $appends = [
        'my_schedule'
    ];

    public function getMyScheduleAttribute()
    {
        if (auth()->user()) {
            return $this->users->contains(auth()->user()->id);
        }
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_calendars', 'calendar_id', 'user_id');
    }

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'speaker_has_calendars', 'calendar_id', 'speaker_id');
    }
}
