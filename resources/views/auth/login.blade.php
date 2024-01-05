@extends('base')

@section('title') Вход @endsection

@section('content')
    <div class="container">
        <form method="post">
            @csrf
            <h1>Вход</h1>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                @error('email')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror
            </div>

            <input type="submit" value="Войти" class="btn btn-primary">
        </form>

        <p class="text-muted">
            Нет аккаунта?
            <a href="{{ route('register') }}">Зарегистрироваться</a>
        </p>
    </div>
@endsection