@extends('layouts.base')

@section('title') Лента @endsection

@section('content')
    <div class="container">
        <h1>Лента</h1>

        @forelse($posts as $post)
            <div class="row">
                <div class="col p-4 d-flex flex-column border rounded">
                    <h3>{{ $post->title }}</h3>
                    <div class="text-muted">{{ $post->published_at }}</div>
                    <p>{!! Str::limit($post->content, 20) !!}</p>
                    <h4>Комментарии</h4>
                    @forelse($post->comments as $comment)
                        <p>{{ $comment->user->name }} пишет: {{ $comment->content }}</p>
                    @empty
                        <p class="text-muted">Комментариев пока нет, будьте первым!</p>
                    @endforelse
                    @auth
                        <form class="d-flex comment-form">
                            <input type="hidden" name="user_id" value="{{ $request->user()->id }}">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="text" name="content" class="form-control" required>
                            <input type="submit" value="Отправить" class="btn btn-primary">
                        </form>
                    @endauth
                    @guest
                        <div class="alert alert-warning">
                            Войдите для того, чтобы оставить комментарий
                        </div>
                    @endguest
                </div>
            </div>
        @empty
            <div class="alert alert-info">Пока не опубликованно ни одного поста</div>
        @endforelse
    </div>

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
                console.log(await response.json());
            } finally {
                button.classList.remove('disabled');
            }

        }

        document.querySelectorAll('.comment-form').forEach(form => form.addEventListener('submit', publishComment));
    </script>
@endsection
