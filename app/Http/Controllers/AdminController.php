<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'comments' => Comment::toModerate()->get()
        ]);
    }
}
