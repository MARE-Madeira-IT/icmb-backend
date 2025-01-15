<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $appends = ['last_message', 'unread_messages'];

    public function getLastMessageAttribute()
    {
        return $this->messages()->latest()->first();
    }

    public function getUnreadMessagesAttribute()
    {
        return $this->messages()->where('user_id', '!=', auth()->id())->where('read_at', null)->count();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'chat_has_users', 'chat_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
