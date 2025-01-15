<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    protected $appends = ['self'];



    protected $fillable = [
        'content', 'user_id', 'chat_id', 'read_at'
    ];

    public $casts = [
        'created_at' => 'datetime:Y-m-d H:00'
    ];

    public function getSelfAttribute()
    {
        return $this->user_id == auth()->id();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    public function scopePerDay($query)
    {
        return $query->groupBy(DB::raw('Date(created_at)'));
    }
}
