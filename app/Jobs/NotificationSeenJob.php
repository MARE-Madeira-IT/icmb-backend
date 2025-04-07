<?php

namespace App\Jobs;

use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class NotificationSeenJob implements ShouldQueue
{
    use Queueable;
    private $notifications, $user_id;

    /**
     * Create a new job instance.
     */
    public function __construct($aNotifications, $userId)
    {
        $this->notifications = $aNotifications;
        $this->user_id = $userId;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->notifications as $notification) {
            $notification = Notification::find($notification->id);
            if ($notification) {
                $notification->users()->updateExistingPivot($this->user_id, ['seen' => true]);
            }
        }
    }
}
