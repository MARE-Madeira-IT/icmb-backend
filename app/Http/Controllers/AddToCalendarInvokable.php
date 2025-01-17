<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarResource;
use App\Models\Calendar;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AddToCalendarInvokable extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Calendar $calendar)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $user->calendars()->syncWithoutDetaching($calendar->id);

        return new CalendarResource($user->calendars);
    }
}
