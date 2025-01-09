<?php

use Illuminate\Support\Facades\Route;

Route::get('{slug}', function () {
    return view('welcome');
})->where('slug', '(?!api)([A-z\d\/_.]+)?');
