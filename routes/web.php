<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD

// Route with URL parameters
Route::get('/evaluation/{name}/{prelim}/{midterm}/{final}', function ($name, $prelim, $midterm, $final) {
    return view('evaluation', compact('name', 'prelim', 'midterm', 'final'));
});
=======
use App\Http\Controllers\BiodataController;

Route::get('/biodata', [BiodataController::class, 'index']);
>>>>>>> d999090a2cb1dad75ea175646c3015bbe20806ed
