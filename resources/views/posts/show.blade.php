@extends('base')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">{{ $post->author }}, {{ $post->date }}</p>
        @foreach($post->tags as $tag)
            <span class="badge rounded-pill text-bg-primary">{{ $tag->name }}</span>
        @endforeach
        <p>{{ $post->content }}</p>
    </div>
@endsection