<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signin() 
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user.me');
        }

        return back()->withErrors([
            'email' => 'Указаны неверные данные'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('auth.signin')->with('success', 'Вы успешно вышли');
    }

    public function signup() 
    {
        return view('auth.signup');
    }

    public function register(Request $request) 
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|string|min:5|confirmed',
        ]);

        User::create(request(['name', 'email', 'password']));

        return redirect()->route('auth.signin')->with('success', 'Аккаунт успешно зарегистрирован');
    }
}
