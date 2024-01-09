<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'comments' => Comment::all()->where('accepted_at', null)->where('blocked_at', null)
        ]);
    }
}
