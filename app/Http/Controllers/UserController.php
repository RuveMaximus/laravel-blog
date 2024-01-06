<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function me(Request $request) 
    {
        return view('user.profile', [
            'user' => $request->user()
        ]);
    }

    public function edit(Request $request)
    {
        return view('user.edit', [
            'user' => $request->user()
        ]);
    }
}
