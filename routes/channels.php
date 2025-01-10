<?php

use App\Http\Middleware\JwtMiddleware;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;
use Pusher\Pusher;


Broadcast::channel('chats.{chatSocket}', function (User $user, string $chatSocket) {
    return Chat::where("socket", $chatSocket)->first()->users->contains($user->id);
});

Broadcast::routes(["middleware" => [JwtMiddleware::class]]);
