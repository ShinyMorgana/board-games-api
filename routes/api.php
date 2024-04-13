<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BoardGameController;

// Define the route for getting all board games
Route::get('/boardgames', [BoardGameController::class, 'index']);
Route::get('/api/boardgames', [BoardGameController::class, 'index']);

// You can add more API routes here