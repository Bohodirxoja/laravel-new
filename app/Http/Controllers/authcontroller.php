<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Hash;

class authcontroller extends Controller
{
    public  function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register_user(Request $request)
    {
       $validated = $request->validate([
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

         $validated['password']=Hash::make($validated['password']);

         $user= User::create($validated);
         $user->roles()->attach(3);

         auth()->login($user);
         return redirect('/')->with("success");


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
