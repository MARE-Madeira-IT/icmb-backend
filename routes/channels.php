<?php

use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('chat', function ($user) {
    return true;
});

Route::post('/auth', function (User $user, string $chatSocket) {
    return Chat::where("socket", $chatSocket)->first()->contains($user->id);
});

Broadcast::channel('chats.{chatSocket}', function (User $user, string $chatSocket) {
    // true;
    return Chat::where("socket", $chatSocket)->first()->contains($user->id);
});
