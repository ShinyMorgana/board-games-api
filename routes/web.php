<?php

use App\Http\Controllers\API\BoardGameController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Http; // Import the Http facade
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/api/boardgames', [BoardGameController::class, 'index']);
