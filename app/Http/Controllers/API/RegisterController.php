<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest; // Correct namespace for the request
use App\Models\User;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Kernel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth; // Ensure you've imported JWTAuth

class RegisterController extends Controller
{
    public function __construct()
    {
        
    }

    public function register(RegisterUserRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'], // Password will be hashed in the User model's setPasswordAttribute mutator
        ]);

        // Instead of using Auth::login, you generate a token and return it
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
            'token' => $token
        ], 201);
    }
}
