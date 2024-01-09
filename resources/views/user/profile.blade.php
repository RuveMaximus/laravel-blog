@extends('layouts.base')

@section('title', 'Профиль') 

@section('content')
<div class="row">
    <h1>{{ $user->name }}</h1>

    @admin 
        <div class="alert alert-warning">
            Вы являетесь администратором. Вам открыт доступ <a href="{{ route('admin.index') }}" class="alert-link">в панель администратора</a>
        </div>
    @endadmin

    @if($user->bio)
        <h2>Обо мне</h2>
        <p>{{ $user->bio }}</p>
    @endif

    <div class="btn-group">
        <a href="{{ route('user.edit') }}" class="btn btn-warning">Изменить данные</a>
        <a href="{{ route('auth.logout') }}" class="btn btn-secondary">Выйти</a>
    </div>
</div>
@endsection