<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthenticationAPIController extends Controller
{
    function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => 'required',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response('Account registered successfully', 201);
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response('not your account bro, recheck your credentials ', 401);
        }

        return $user->createToken($user->email)->plainTextToken;
    }

    function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response('logged out successfully', 201);;
    }
}
