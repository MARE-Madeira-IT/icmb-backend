<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChatResource;
use App\Models\Chat;
use App\Models\Notification;
use App\Models\UserHasNotification;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'User not found'], 404);
            }

            $chats = Chat::whereHas('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();

            return ChatResource::collection($chats);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Invalid token'], 400);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $chatExists = Chat::whereHas('users', function ($query) use ($request) {
            $query->where('user_id', $request->user_id);
        })->whereHas('users', function ($query) {
            $query->where('user_id', auth()->id());
        })->first();

        if ($chatExists) {
            return new ChatResource($chatExists);
        }

        $chat = Chat::create([
            'socket' => str_replace(".", "", uniqid(mt_rand(0, 10000), true)),
        ]);

        $chat->users()->attach([$request->user_id, auth()->id()]);


        Notification::CreateConnection(auth()->user(), $request->user_id);

        return new ChatResource($chat);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        return new ChatResource($chat);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
