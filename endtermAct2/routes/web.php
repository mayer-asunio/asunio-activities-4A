<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

Route::get('/', [PhotoController::class, 'index']);

Route::post('/upload-single', [PhotoController::class,
'storeSingle'])->name('photos.store.single');

Route::post('/upload-multiple', [PhotoController::class,
'storeMultiple'])->name('photos.store.multiple');

// 2. Added DELETE route to handle image removal
Route::delete('/photos/{photo}', [PhotoController::class,
'destroy'])->name('photos.destroy');
