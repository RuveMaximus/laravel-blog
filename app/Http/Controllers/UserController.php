<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    public function update(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        $user->update($request->all());

        return redirect()->route('user.me')->with('success', 'Успешно обновленно');
    }
}
