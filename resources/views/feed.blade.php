@extends('layouts.base')

@section('title') Лента @endsection

@section('content')
    <div class="container">
        <h1>Лента</h1>

        @forelse($posts as $post)
            <div class="row">
                <div class="col p-4 d-flex flex-column border rounded">
                    <h3>{{ $post->title }}</h3>
                    <div class="text-muted">{{ $post->pablished_at }}</div>
                    <p>{!! Str::limit($post->content, 20) !!}</p>
                </div>
            </div>
        @empty
            <div class="alert alert-info">Пока не опубликованно ни одного поста</div>
        @endforelse
    </div>
@endsection
