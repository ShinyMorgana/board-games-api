<?php

use App\Http\Controllers\API\BoardGameController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Support\Facades\Http; // Import the Http facade
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Route::middleware('cors')->get('/api/boardgames', [BoardGameController::class, 'index']);
Route::get('api/boardgames', [BoardGameController::class, 'index']);
//Route::get('/boardgames', [BoardGameController::class, 'index']);
Route::post('api/register', [RegisterController::class, 'register']);
Route::post('api/boardgames', [BoardGameController::class, 'store2']);



Route::get('/test', [TestController::class, 'test']);
