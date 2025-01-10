<?php

use App\Http\Middleware\JwtMiddleware;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;
use Pusher\Pusher;



// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });


Broadcast::channel('chat', function ($user) {
    return true;
});


// Route::post('/auth', function (Request $request) {
//     return Broadcast::auth($request);
// });

Broadcast::channel('chats.{chatSocket}', function (User $user, string $chatSocket) {
    // true;
    return Chat::where("socket", $chatSocket)->first()->users->contains($user->id);
});

Broadcast::routes(["middleware" => [JwtMiddleware::class]]);
