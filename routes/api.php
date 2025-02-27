<?php

use App\Http\Controllers\UpdateCalendarInvokable;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MarkAsReadInvokable;
use App\Http\Controllers\MediaResourceController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NetworkingController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RemoveFromCalendarInvokable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\JwtMiddleware;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::get('me', [AuthController::class, 'getUser']);

Route::apiResource('/media', MediaResourceController::class);
Route::apiResource('/calendars', CalendarController::class);
Route::apiResource('/question', QuestionController::class);
Route::apiResource('/forms', FormController::class);
Route::apiResource('/messages', MessageController::class);
Route::apiResource('/chats', ChatController::class);
Route::apiResource('/networkings', NetworkingController::class);
Route::patch('/users', [AuthController::class, 'updateUser']);



Route::put('mark-as-read', MarkAsReadInvokable::class);

Route::post('update-calendar/{calendar}', UpdateCalendarInvokable::class);
Route::post('remove-from-calendar', RemoveFromCalendarInvokable::class);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::get('user', [AuthController::class, 'getUser']);
    Route::post('logout', [AuthController::class, 'logout']);
});
