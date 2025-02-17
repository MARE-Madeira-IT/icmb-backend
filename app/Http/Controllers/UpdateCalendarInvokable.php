<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarResource;
use App\Models\Calendar;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UpdateCalendarInvokable extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Calendar $calendar)
    {
        $user = JWTAuth::parseToken()->authenticate();

        if ($user->calendars->contains($calendar->id)) {
            $user->calendars()->detach($calendar->id);
        } else {
            $user->calendars()->syncWithoutDetaching($calendar->id);
        }


        return new CalendarResource($calendar);
    }
}
