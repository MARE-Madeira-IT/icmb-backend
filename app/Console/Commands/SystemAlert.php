<?php

namespace App\Console\Commands;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Console\Command;

class SystemAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:system-alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new notification alert for all users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $title = $this->ask('Title of the alert');
        $body = $this->ask('Body of the alert');
        $type = $this->choice('Type of the alert', ['connection', 'system', 'reminder'], 1);
        $users = User::all();

        $notification = Notification::create([
            'title' => $title,
            'body' => $body,
            'type' => $type,
        ]);

        foreach ($users as $user) {
            $notification->users()->attach($user->id, ['seen' => false]);
        }

        $this->info('Notification sent to all users');
    }
}
