<?php

namespace App\Http\Controllers;

use App\Models\LogRecord;
use Illuminate\Http\Request;

class LogRecordController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        $newLog = LogRecord::create([
            "user_id" => $user?->id,
            "log" => $request->log
        ]);

        return $newLog;
    }
}
