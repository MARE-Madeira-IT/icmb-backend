<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarResource;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AddToCalendarInvokable extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $user->calendars()->syncWithoutDetaching($request->calendar_id);

        return new CalendarResource($user->calendars);
    }
}
