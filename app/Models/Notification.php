<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        "title",
        "body",
        "type",
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_notifications', 'notification_id', 'user_id')->withPivot("seen");
    }

    public static function NewMessage($chatId, $userId)
    {
        $chat = Chat::find($chatId);

        $recipient = $chat->users()->where('users.id', '!=', $userId)->first();

        $hasNewMessage = Notification::where('title', 'Unread message')
            ->where('body', 'You have unread messages')
            ->where('type', 'connection')
            ->first();

        if (!$hasNewMessage) {
            $notification = Notification::create([
                'title' => 'Unread message',
                'body' => 'You have unread messages',
                'type' => 'connection',
            ]);
        } else {
            $notification = $hasNewMessage;
        }

        $attachNotification = UserHasNotification::where('notification_id', $notification->id)
            ->where('user_id', $recipient->id)
            ->first();

        if ($attachNotification) {
            $attachNotification->seen = false;
            $attachNotification->save();
        } else {
            $notification->users()->attach([$recipient->id]);
        }
    }

    public static function CreateConnection($currentUser, $userId)
    {
        $notification = Notification::create([
            'title' => $currentUser->name,
            'body' => 'Connnected with you',
            'type' => 'connection',
        ]);

        $notification->users()->attach([$userId]);
    }

    public static function MarkAsSeen($notifications)
    {
        foreach ($notifications as $notification) {
            $notification = Notification::find($notification->id);
            if ($notification) {
                $notification->users()->updateExistingPivot(auth()->id(), ['seen' => true]);
            }
        }
    }
}
