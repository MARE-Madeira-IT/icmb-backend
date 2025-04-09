<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Jobs\SendMessage;
use App\Models\Message;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $messages = Message::where('chat_id', $request->chat_id)
            ->orderBy('created_at', 'asc')
            ->get();

        // Group messages by date
        $groupedMessages = $messages->groupBy(function ($message) {
            return Carbon::parse($message->created_at)->toDateString();
        })->map(function ($messages, $date) {
            return [
                'date' => $date,
                'messages' => MessageResource::collection($messages)->values(),
            ];
        })->values(); // Reset array indexes

        return response()->json($groupedMessages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        $validator = $request->validated();
        $message = Message::create([
            'content' => $validator["content"],
            'user_id' => $validator["user_id"],
            'chat_id' => $validator["chat_id"]
        ]);

        $message->load('user')->load('chat');

        broadcast(new MessageCreated(new MessageResource($message), Carbon::parse($message->created_at)->toDateString()))->toOthers();
        Notification::NewMessage($validator["chat_id"], auth()->id());


        // SendMessage::dispatch($message);


        return new MessageResource($message);

        // return response()->json([
        //     'success' => true,
        //     'message' => "Message created and job dispatched.",
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
