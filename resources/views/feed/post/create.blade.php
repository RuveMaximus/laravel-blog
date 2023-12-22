@extends('base')

@section('content')
    <div class="container">
        <h1>Создать новый пост</h1>

        <div class="row">
            <div class="col">
                <form method="post" action="{{ route('feed.post.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Содержание</label>
                        <textarea class="form-control" id="content" name="content">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-lavel">Автор</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}" placeholder="Представьтесь">
                        @error('author')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Создать пост</button>
                </form>
            </div>
        </div>
    </div>
@endsection
