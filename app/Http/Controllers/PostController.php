<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;


class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();
        return view('post.index', compact('posts', 'request'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'nullable|string',
        ]);

        $post = Post::create(
            array_merge(
                $request->all(),
                ['user_id' => $request->user()->id]
            )
        );

        if ($request->has('tags')) {
            $tagIds = Tag::parseFromStr($request->input('tags'));
            $post->tags()->attach($tagIds);
        }

        return redirect()->route('post.index')->with('success', 'Пост успешно создан!');
    }

    public function show(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post', 'request'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
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

        return redirect()->route('post.index')->with('success', 'Пост успешно обновлен!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Пост успешно удален!');
    }
}

