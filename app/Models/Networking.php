<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Networking extends Model
{
    protected $fillable = ['user_id', 'name', 'role', 'image', 'description'];
    protected $appends = ['connected'];

    public function getConnectedAttribute()
    {
        return Chat::whereHas('users', function ($query) {
            $query->where('user_id', $this->user_id);
        })
            ->whereHas('users', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->exists();
    }
}
