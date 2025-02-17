<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarResource;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class RemoveFromCalendarInvokable extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();


        if ($user->calendars->contains($request->calendar_id)) {
            $user->calendars()->detach($request->calendar_id);
        } else { }



        return response()->json(null, 204);
    }
}
