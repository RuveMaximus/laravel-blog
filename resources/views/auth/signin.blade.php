@extends('layouts.base')

@section('title') Вход @endsection

@section('content')
    <div class="container">
        <form method="post" action="{{ route('auth.login') }}">
            @csrf
            <h1>Вход</h1>

            <x-form-field input-type='email' field-name='email'>Email</x-form-field>
            <x-form-field input-type='password' field-name='password' remember=false>Пароль</x-form-field>

            <input type="submit" value="Войти" class="btn btn-primary">
        </form>

        <p class="text-muted">
            Нет аккаунта?
            <a href="{{ route('auth.signup') }}">Зарегистрироваться</a>
        </p>
    </div>
@endsection