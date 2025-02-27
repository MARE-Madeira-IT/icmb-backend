<?php

namespace App\Http\Controllers;

use App\Http\Requests\NetworkingRequest;
use App\Http\Resources\NetworkingResource;
use App\Models\Networking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NetworkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NetworkingResource::collection(Networking::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NetworkingRequest $request)
    {
        $user = Auth::user();

        if (!$user->networkings()->where('created_at', '>', now()->subHours(6))->exists()) {
            $validator = $request->validated();
            $record = Networking::create($validator);
            return new NetworkingResource($record);
        }

        return response()->json([
            'errors' => "User can't share their profile more than once every 6 hours",
        ], 422);
    }

    /**
     * Display the specified resource.
     */
    public function show(Networking $networking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Networking $networking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Networking $networking)
    {
        //
    }
}
