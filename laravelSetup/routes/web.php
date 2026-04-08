<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ActivityController;

Route::get('/customer/{customerId}/{name}/{address}', 
    [OrderController::class, 'customer']);

Route::get('/item/{itemNo}/{name}/{price}', 
    [OrderController::class, 'item']);

Route::get('/order/{customerId}/{name}/{orderNo}/{date}', 
    [OrderController::class, 'order']);

Route::get('/orderdetails/{transNo}/{orderNo}/{itemId}/{name}/{price}/{qty}', 
    [OrderController::class, 'orderdetails']);

Route::get('/oddeven', [ActivityController::class, 'oddEvenForm']);
Route::post('/oddeven', [ActivityController::class, 'checkOddEven']);

Route::get('/multiplication', [ActivityController::class, 'multiplicationForm']);
Route::post('/multiplication', [ActivityController::class, 'generateTable']);

Route::get('/login', [ActivityController::class, 'loginForm']);
Route::post('/login', [ActivityController::class, 'loginCheck']);

Route::get('/register', [ActivityController::class, 'registerForm']);
Route::post('/register', [ActivityController::class, 'registerSubmit']);
?>