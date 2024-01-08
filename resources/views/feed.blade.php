@extends('layouts.base')

@section('title', 'Лента')

@section('content')
    <h1>Лента</h1>

    @forelse($posts as $post)
        <div class="row position-relative">
            <div class="col p-4 d-flex flex-column border rounded mb-4">
                <h3>{{ $post->title }}</h3>
                <div class="text-muted">{{ $post->published_at }}</div>
                <p>{!! Str::limit($post->content, 64) !!}</p>
                <a href="{{ route('post.show', $post->id) }}" class="icon-link gap-1 stretched-link">Читать полностью</a>
            </div>
        </div>
    @empty
        <div class="alert alert-info">Пока не опубликованно ни одного поста</div>
    @endforelse
@endsection
