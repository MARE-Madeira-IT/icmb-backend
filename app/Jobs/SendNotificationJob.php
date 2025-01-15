<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Kreait\Firebase\Messaging\CloudMessage;

class SendNotificationJob implements ShouldQueue
{
    use Queueable;
    private $title, $body, $tokens;

    /**
     * Create a new job instance.
     */
    public function __construct($title, $body, array $tokens)
    {
        $this->title = $title;
        $this->body = $body;
        $this->tokens = $tokens;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $messaging = app('firebase.messaging');

        $message = CloudMessage::new()
            ->withNotification([
                "title" => $this->title,
                "body" => $this->body
            ])
            ->withData(['key' => 'value']);

        $messaging->sendMulticast($message, $this->tokens);
    }
}
