<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:8|confirmed",
        ]);
        if($validate->fails()){
            return response()->json([
                "message" => "Validation failed",
                "errors" => $validate->errors()
            ] , 422);
        }
        $accessToken = Str::random(64);
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "access_token" => $accessToken,
        ]);
        return response()->json([
            "message" => "User registered successfully",
            "access_token" => $accessToken
        ], 201);
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "email" => "required|email|exists:users,email",
            "password" => "required|string|min:8",
        ]);
        if($validate->fails()){
            return response()->json([
                "message" => "Validation failed",
                "errors" => $validate->errors()
            ] , 422);
        }
        $user = User::where("email", $request->email)->first();
        $isValide = Hash::check($request->password , $user->password);
        if(!$isValide){
            return response()->json([
                "message" => "Invalid credentials"
            ], 401);
        }
        $accessToken = Str::random(64);
        $user->update([
            "access_token" => $accessToken,
        ]);
        return response()->json([
            "message" => "Login successful",
            "access_token" => $accessToken
        ], 200);
    }

    public function logout(Request $request)
    {
        $accessToken = $request->header('Authorization');
        if(!$accessToken){
            return response()->json([
                "message" => "Access token is required"
            ], 401);
        }
        $user = User::where("access_token",$accessToken)->first();
        if(!$user){
            return response()->json([
                "message" => "Invalid access token"
            ], 401);
        }
        $user->update([
            "access_token" => null,
        ]);
        return response()->json([
            "message" => "Logout successful"
        ], 200);
    }
}
