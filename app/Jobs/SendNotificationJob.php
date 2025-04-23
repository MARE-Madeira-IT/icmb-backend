<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Kreait\Firebase\Messaging\CloudMessage;

class SendNotificationJob implements ShouldQueue
{
    use Queueable;
    private $title, $body, $user;

    /**
     * Create a new job instance.
     */
    public function __construct($title, $body, $user)
    {
        $this->title = $title;
        $this->body = $body;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $messaging = app('firebase.messaging');

        $message = CloudMessage::new()
            // ->withNotification([
            //     "title" => $this->title,
            //     "body" => $this->body
            // ])
            ->withData(["title" => $this->title, "body" => $this->body]);

        $tokens = $this->user->pushNotificationTokens()->pluck("token")->toArray();

        $messaging->sendMulticast($message, $tokens);
    }
}
