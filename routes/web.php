<?php

use Illuminate\Support\Facades\Route;

Route::get('/student/{id}/{name}', function ($id, $name) {
    return view('student', compact('id', 'name'));
});

Route::get('/course/{course}/{yearLevel?}', function ($course, $yearLevel = "Not Specified") {
    return view('course', compact('course', 'yearLevel'));
});

Route::get('/ojt/{company}/{city}/{allowance?}', function ($company, $city, $allowance = "No") {
    return view('ojt', compact('company', 'city', 'allowance'));
});

Route::get('/event/{event}/{participant}/{year}', function ($event, $participant, $year) {
    return view('event', compact('event', 'participant', 'year'));
});
