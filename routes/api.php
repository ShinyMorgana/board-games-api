<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BoardGameController;
use App\Http\Controllers\API\RegisterController;

// Place the Board Games route first
Route::get('api/boardgames', [BoardGameController::class, 'index']);
Route::post('api/boardgames', [BoardGameController::class, 'store']);
Route::post('/boardgames', [BoardGameController::class, 'store']);



// Place the Register route
Route::post('/register', [RegisterController::class, 'register']);

// Any additional routes can go here