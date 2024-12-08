<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthenticationController extends Controller
{
    function getRegister(){
        return view('register');
    }

    function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => 'required',

        ], [
            'name.required' => 'Please enter your name!',
            'email.required' => 'Please enter your email!',
            'password.required' => 'Please enter your password!',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/');
    }
    function getLogin(){
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ], [
            'email.required' => 'Please enter your email!',
            'password.required' => 'Please enter your password!',
        ]);

        $credentials = ([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            // Cookie::queue(key, value)
            Cookie::queue('name', Auth::User()->name);
            //untuk liat user ngapain(untuk debug, bagus)
            // Log::info(Auth::user()->email.'is login');
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'the provided credentials do not match out records',
        ])->onlyInput('email');
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::expire('name');
        return redirect('/');
    }
}
