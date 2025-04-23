<?php

namespace App\Console\Commands;

use App\Jobs\SendNotificationJob;
use App\Models\User;
use Illuminate\Console\Command;

class TestGuzzle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:guzzle';

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
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://fcm.googleapis.com');

        logger("status code");
        logger( $response->getStatusCode());
    }
}
