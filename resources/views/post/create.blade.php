@extends('layouts.base')

@section('title', 'Создать пост')

@section('content')
    <div class="container">
        <h1>Создать новый пост</h1>

        <div class="row">
            <div class="col">
                <form method="post" action="{{ route('post.store') }}">
                    @csrf
                    <x-form-field field-name="title">Заголовок</x-form-field>

                    <div class="mb-3">
                        <label for="content" class="form-label">Содержание</label>
                        <textarea class="form-control" id="content" name="content">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <x-form-field field-name="tags">Теги (разделенные запятыми)</x-form-field>
                    <x-form-field field-name="published_at" input-type="datetime-local">
                        Опубликовать в
                        <x-slot:help>Оставьте поле пустым чтобы опубликовать немделенно</x-slot>
                    </x-form-field>

                    <button type="submit" class="btn btn-primary">Создать пост</button>
                </form>
            </div>
        </div>
    </div>
@endsection
