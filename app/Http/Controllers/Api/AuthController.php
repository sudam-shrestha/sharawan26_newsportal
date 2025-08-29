<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|max:50",
            "email" => "required|max:50|email|unique:users",
            "password" => "required|max:50",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'token' => null,
                'message' => $validator->errors()
            ], 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            "token" => $token,
            'message' => 'User registered successfully'
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|max:50|email",
            "password" => "required|max:50",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'token' => null,
                'message' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'token' => null,
                'message' => 'Invalid credentials'
            ], 422);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            "token" => $token,
            'message' => 'User loggedIn successfully'
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'User loggedOut successfully'
        ]);
    }
}
