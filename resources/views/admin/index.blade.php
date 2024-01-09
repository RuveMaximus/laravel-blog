@extends('layouts.base')

@section('title', 'Панель администратора')

@section('content')
    <h1>Панель администратора</h1>
    <h2>Комментарии</h2>
    <table class="table">
        <thead>
            <tr>
                <td>Комментарий</td>
                <td>Пользователь</td>
                <td>Действие</td>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
                <td><a href="{{ route('post.show', $comment->post) }}">{{ $comment->content }}</a></td>
                <td>{{ $comment->user->name }}</td>
                <td>
                    <a href="{{ route('comment.block', $comment) }}" class="btn btn-danger">Заблокировать</a>
                    <a href="{{ route('comment.accept', $comment) }}" class="btn btn-success">Подтвердить</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection