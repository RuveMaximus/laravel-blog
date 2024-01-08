@extends('layouts.base')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p class="text-muted">{{ $post->author->name }}, {{ $post->published_at }}</p>
    @foreach($post->tags as $tag)
        <span class="badge rounded-pill text-bg-primary">{{ $tag->name }}</span>
    @endforeach
    <p>{{ $post->content }}</p>
    <h3>Комментарии</h3>
    @forelse($post->comments as $comment)
        <p><b>{{ $comment->user->name }}</b>: {{ $comment->content }}</p>
    @empty
        <p class="text-muted">Комментариев пока нет, будьте первым!</p>
    @endforelse
    <form id="comment-form" class="d-flex">
        <input type="hidden" name="user_id" value="{{ $request->user()->id }}">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="text" name="content" class="form-control" required>
        <input type="submit" value="Отправить" class="btn btn-primary">
    </form>
@endsection

@push('scripts')
<script>
    const publishComment = async (event) => {
        event.preventDefault();
        
        const button = event.target.querySelector('input[type="submit"]');
        button.classList.add('disabled');

        const comment = new FormData(event.target);

        try {
            const response = await fetch('/api/comment/', {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(Object.fromEntries(comment)),
            })
        } finally {
            button.classList.remove('disabled');
        }
    }

    document.getElementById('comment-form')?.addEventListener('submit', publishComment);
</script>
@endpush