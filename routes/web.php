<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD

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
=======
<<<<<<< HEAD

// Route with URL parameters
Route::get('/evaluation/{name}/{prelim}/{midterm}/{final}', function ($name, $prelim, $midterm, $final) {
    return view('evaluation', compact('name', 'prelim', 'midterm', 'final'));
});
=======
use App\Http\Controllers\BiodataController;

Route::get('/biodata', [BiodataController::class, 'index']);
>>>>>>> d999090a2cb1dad75ea175646c3015bbe20806ed
>>>>>>> 3baf2f7f9b65dc4e8237105f32f96658102979e4
