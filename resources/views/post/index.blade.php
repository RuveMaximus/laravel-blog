@extends('layouts.base')

@section('title', 'Посты')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Мои посты</h1>
        <a href="{{ route('post.create') }}" class="btn btn-primary">Создать</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Дата публикации</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->published_at }}</td>
                    <td>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-info">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form action="{{ route('post.destroy', $post->id) }}" method="post" class="d-inline">
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
@endsection
