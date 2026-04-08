<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', [AuthController::class, 'showLogin']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', [ProfileController::class, 'dashboard']);
Route::get('/profile', [ProfileController::class, 'edit']);
Route::post('/profile/update', [ProfileController::class, 'update']);

Route::get('/logout', [AuthController::class, 'logout']);