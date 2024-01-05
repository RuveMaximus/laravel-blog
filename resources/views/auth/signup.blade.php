@extends('base')

@section('title') Регистрация @endsection

@section('content')

<div class="container">
    @if ($errors->any()) 
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('auth.create_user') }}">
        @csrf
        <h1>Регистрация</h1>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Придумайте пароль</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password_repeat" class="form-label">Повторите пароль</label>
            <input type="password" name="password_repeat" id="password_repeat" class="form-control">
        </div>

        <input type="submit" value="Зарегистрироваться" class="btn btn-primary">
        <p class="text-muted">
            Уже есть аккаунт?
            <a href="{{ route('auth.signin') }}">Войти</a>
        </p>
    </form>
</div>
@endsection