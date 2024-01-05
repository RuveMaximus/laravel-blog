<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signin() 
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('auth.profile'));
        }

        return back()->withErrors([
            'email' => 'Указаны неверные данные'
        ])->onlyInput('email');
    }

    public function signup() 
    {
        return view('auth.register');
    }

    public function create_user(Request $request) 
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|string|min:5|confirmed',
        ]);

        User::create(request(['name', 'email', 'password']));

        return redirect(route('login'));
    }

    public function profile(Request $request) 
    {
        return view('auth.profile', compact('request'));
    }
}
