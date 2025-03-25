<?php

namespace App\Http\Controllers;

use App\Models\PushNotificationToken;
use Illuminate\Http\Request;

class PushNotificationTokenController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        $new = PushNotificationToken::updateOrCreate([
            "token" => $request->token,
            "device" => $request->device,
        ], [
            "token" => $request->token,
            "user_id" => $user->id,
            "device" => $request->device,
        ]);

        return $new;
    }
}
