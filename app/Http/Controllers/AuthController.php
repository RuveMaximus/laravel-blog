<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signin() 
    {
        return view('auth.signin');
    }

    public function signup() 
    {
        return view('auth.signup');
    }

    public function create_user(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ]);

        if ($request->input('password') !== $request->input('password_repeat')) {
            return redirect()->back()->withErrors(['password' => 'Пароли не совпадают']);
        }
        return redirect(route('auth.signin'));
    }

    public function show() 
    {
        return view('auth.profile');
    }
}
