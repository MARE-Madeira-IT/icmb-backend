<?php

namespace App\Http\Controllers;

use App\Http\Resources\MediaResourceResource;
use App\Models\MediaResource;
use Illuminate\Http\Request;

class MediaResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MediaResourceResource::collection(MediaResource::all()->groupBy("type"));
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
    public function show(MediaResource $mediaResource)
    {
        return new MediaResourceResource($mediaResource);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MediaResource $mediaResource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MediaResource $mediaResource)
    {
        //
    }
}
