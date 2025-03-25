<?php

namespace App\Console\Commands;

use App\Jobs\SendNotificationJob;
use App\Models\User;
use Illuminate\Console\Command;

class SendNotificationToUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-test-notification {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch Job';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SendNotificationJob::dispatch("Test title", "Test Body", User::findOrFail($this->argument("user_id")));
    }
}
