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

        $messaging->sendMulticast($message, ['dNb3uuHuVkSbtRLb3xJ2X2:APA91bFhWPT6lu_tp8tRSU5b3siw7I0BR_PD75z70jnC6ThYUZeqvk2tMoiKKeAU3vBcSGvCgwgP3ohVTuaAzlab55hVhcIp35dBPsLfO2F6sY1Zvs4ZcN4']);
    }
}
