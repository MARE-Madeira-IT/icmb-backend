<?php

namespace App\Jobs;

use GuzzleHttp\Exception\ConnectException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Factory;

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
        try {
            $tokens = $this->user->pushNotificationTokens()->pluck("token")->toArray();
            if ($tokens) {
                $factory = (new Factory)->withServiceAccount(storage_path('app/private/serviceAccountKey.json'));
                $messaging = $factory->createMessaging();

                $message = CloudMessage::new()
                    ->withNotification(["title" => $this->title, "body" => $this->body])
                    // ->withData(["title" => $this->title, "body" => $this->body])
                ;


                $messaging->sendMulticast($message, $tokens);
            }
        } catch (ConnectException $th) {
            logger("CAUGHT!");
            logger($th->getMessage());
        }
    }
}
