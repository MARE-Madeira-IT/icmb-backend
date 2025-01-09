<?php

namespace App\Jobs;

use App\Events\MessageCreated;
use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $message;

    /**
     * Create a new job instance.
     */
    public function __construct($aMessage)
    {
        $this->message = $aMessage;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        MessageCreated::dispatch([
            'id' => $this->message->id,
            'chat_id' => $this->message->chat_id,
            'user' => $this->message->user,
            'content' => $this->message->content,
            'created_at' => $this->message->created_at,
        ]);
    }
}
