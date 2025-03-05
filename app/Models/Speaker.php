<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    public function calendars()
    {
        return $this->belongsToMany(Calendar::class, 'speaker_has_calendars', 'speaker_id', 'calendar_id');
    }
}
