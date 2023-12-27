@extends('base')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h1>Мои посты</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Создать</a>
        </div>

        @if($request->query('need_author') == "0")
            <div class="alert alert-warning">
                Вы просматриваете посты, у которых нет автора
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Автор</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->date }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Постов еще нет</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
