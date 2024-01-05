<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;


class PostController extends Controller
{
    public function index(Request $request)
    {
        $needAuthor = $request->query('need_author', true);
        if (!$needAuthor) {
            $posts = Post::unknownAuthor()->get();
        } else {
            $posts = Post::all();
        }
        return view('posts.index', compact('posts', 'request'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        $post = Post::create($request->all());

        if ($request->has('tags')) {
            $tagIds = Tag::parseFromStr($request->input('tags'));
            $post->tags()->attach($tagIds);
        }

        return redirect()->route('posts.index')->with('success', 'Пост успешно создан!');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string',
            'date' => 'nullable|date',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Пост успешно обновлен!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Пост успешно удален!');
    }
}

