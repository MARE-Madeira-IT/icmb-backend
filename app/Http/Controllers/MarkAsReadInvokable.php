<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;

class MarkAsReadInvokable extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $messages = Message::where('chat_id', $request->chat_id)->where('user_id', "!=", auth()->user()->id)->where('read_at', null)->get();

        foreach ($messages as $message) {
            $message->read_at = now();
            $message->save();
        }

        return MessageResource::collection($messages);
    }
}
