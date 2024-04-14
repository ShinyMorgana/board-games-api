<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BoardGameController;
use App\Http\Controllers\API\RegisterController;


Route::get('api/boardgames', [BoardGameController::class, 'index']);
Route::post('api/boardgames', [BoardGameController::class, 'store']);
Route::post('/boardgames', [BoardGameController::class, 'store']);
