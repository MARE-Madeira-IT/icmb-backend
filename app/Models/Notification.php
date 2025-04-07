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
