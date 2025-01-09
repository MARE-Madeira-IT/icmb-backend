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

        $user->calendars()->detach($request->calendar_id);

        return response()->json(null, 204);
    }
}
