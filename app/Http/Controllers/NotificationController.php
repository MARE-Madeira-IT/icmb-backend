<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResource;
use App\Jobs\NotificationSeenJob;
use App\Models\Notification;
use App\Models\UserHasNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = auth()->user()
            ->notifications()
            ->withPivot('seen')
            ->latest()
            ->get();

        NotificationSeenJob::dispatch($notifications, auth()->user()->id);


        return NotificationResource::collection($notifications);
    }


    public function count()
    {
        return auth()->user()
            ->notifications()
            ->wherePivot('seen', false)
            ->count();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        UserHasNotification::where('notification_id', $notification->id)->where('user_id', Auth::id())->delete();

        return response()->json(["mesage" => "Deleted"]);
    }
}
