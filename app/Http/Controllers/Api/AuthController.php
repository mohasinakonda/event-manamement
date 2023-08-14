<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum', ['logout']);
    // }
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'The provided credential is incorrect!'
            ]);
        }

        if (!Hash::check($request->password, $user->password, )) {
            throw ValidationException::withMessages([
                'password' => 'The provided credential is incorrect!'
            ]);
        }
        $token = $user->createToken('api-token')->plainTextToken;
        return response([
            'token' => $token
        ]);

    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response([
            'status' => true,
            'message' => 'token deleted successfully!'
        ]);
    }
}