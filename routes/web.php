<?php

use Illuminate\Support\Facades\Route;

// Route with URL parameters
Route::get('/evaluation/{name}/{prelim}/{midterm}/{final}', function ($name, $prelim, $midterm, $final) {
    return view('evaluation', compact('name', 'prelim', 'midterm', 'final'));
});