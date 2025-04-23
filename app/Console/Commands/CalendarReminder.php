<?php

namespace App\Console\Commands;

use App\Jobs\SendNotificationJob;
use App\Models\Calendar;
use App\Models\Notification;
use App\Models\User;
use App\Models\UserHasCalendar;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CalendarReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:calendar-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind users just before their session starts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $calendars = Calendar::where('from', '<=', Carbon::now()->add(10, 'minute'))
            ->where('notified', 0)
            ->get();

        foreach ($calendars as $calendar) {
            $userhasnotifications = UserHasCalendar::where('calendar_id', $calendar->id)->get();

            if (count($userhasnotifications)) {
                $minDiff = round(Carbon::now()->diffInMinutes($calendar->from, true));
                $notification = Notification::create([
                    'title' => $calendar->title,
                    'type' => 'reminder',
                    'body' => "Your session will start in $minDiff minutes.",
                ]);

                foreach ($userhasnotifications as $userhasnotification) {
                    $notification->users()->attach($userhasnotification->user_id);
                    SendNotificationJob::dispatchAfterResponse($calendar->title, "Your session will start in $minDiff minutes.", User::findOrFail($userhasnotification->user_id));
                }
            }
            $calendar->notified = 1;
            $calendar->save();
        }
    }
}
