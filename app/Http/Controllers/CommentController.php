<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        return $post->comments;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentStoreRequest $request)
    {
        $comment = Comment::create($request->all());
        return response()->json($comment);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    
    public function accept(Request $request, Comment $comment)
    {
        $comment->update(['accepted_at' => now()]);
        return redirect()->back()->with('success', 'Комментарий успешно подтвержден');
    }

    public function block(Request $request, Comment $comment)
    {
        $comment->update(['blocked_at' => now()]);
        return redirect()->back()->with('success', 'Комментарий успешно заблокирован');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
