@extends('base')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(count($posts) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Заголовок</th>
                        <th>Содержание</th>
                        <th>Автор</th>
                        <th>Время создания</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post['title'] }}</td>
                            <td>{{ $post['content'] }}</td>
                            <td>{{ $post['author'] }}</td>
                            <td>{{ $post['date'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Нет новостей</p>
        @endif
    </div>
@endsection
