<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $path = storage_path('posts.json');
        $posts = [];

        if (File::exists($path)) {
            $posts = json_decode(File::get($path), true);
        }

        return view('feed.index', ['posts' => $posts, 'title' => 'Новости']);
    }

    public function create()
    {
        return view('feed.post.create');
    }

    public function store(Request $request)
    {
        // Валидация данных
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|min:5',
            'content' => 'required|string',
        ], [
            'title.required' => 'Пожалуйста, укажите заголовок.',
            'title.string' => 'Заголовок должен быть строкой.',
            'title.min' => 'Заголовок не может быть меньше 5 символов.',
            'title.max' => 'Заголовок не может превышать 255 символов.',
            
            'content.required' => 'Содержание поста не может быть пустым',
            'content.string' => 'Содержание должен быть строкой.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('feed.post.create')
                ->withErrors($validator)
                ->withInput();
        }

        $path = storage_path('posts.json');

        // Чтение текущих данных из файла
        $currentData = [];
        if (File::exists($path)) {
            $currentData = json_decode(File::get($path), true);
        }

        // Добавление нового поста
        $currentData[] = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => $request->input('author') ?? 'Гость',
            'date' => now()->toDateTimeString(),
        ];

        File::put($path, json_encode($currentData));
        return redirect()->route('feed')->with('success', 'Пост успешно создан!');
    }
}

