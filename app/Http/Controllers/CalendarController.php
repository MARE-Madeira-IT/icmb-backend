<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarResource;
use App\Models\Calendar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Calendar::where('from', '<', Carbon::now()->add(10, 'minutes'))->get();

        return CalendarResource::collection(Calendar::orderBy('from')->get()->groupBy("from"));
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
    public function show(Calendar $calendar)
    {
        return new CalendarResource($calendar);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calendar $calendar)
    {
        //
    }
}
