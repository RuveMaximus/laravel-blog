@extends('layouts.base')

@section('title', 'Редактирование поста')

@section('content')
    <div class="container">
        <h1>Редактировать пост</h1>

        <form method="post" action="{{ route('post.update', $post->id) }}">
            @csrf
            @method('PUT')

            <x-form-field field-name="title" value="{{ old('title', $post->title) }}">Заголовок</x-form-field>

            <div class="mb-3">
                <label for="content" class="form-label">Содержание</label>
                <textarea class="form-control" id="content" name="content">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <x-form-field field-name="published_at" input-type="datetime-local" value="{{ old('published_at', $post->published_at) }}">Опубликовать в</x-form-field>

            <button type="submit" class="btn btn-primary">Обновить пост</button>
        </form>
    </div>
@endsection
