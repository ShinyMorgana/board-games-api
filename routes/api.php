<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BoardGameController;


Route::get('/boardgames', [BoardGameController::class, 'index']);

// You can add more API routes here