@extends('layouts.base')

@section('title', 'Регистрация')

@section('content')

<div class="container">
    <form method="post" action="{{ route('auth.register') }}">
        @csrf
        <h1>Регистрация</h1>

        <x-form-field input-type='email' field-name='email'>Email</x-form-field>
        <x-form-field field-name='name'>Придумайте имя</x-form-field>
        <x-form-field input-type='password' field-name='password' remember=false>
            Придумайте пароль
            <x-slot:help>Пароль должен состоять как минимум из 5 символов</x-slot>
        </x-form-field>
        <x-form-field input-type='password' field-name='password_confirmation' remember=false>Повторите пароль</x-form-field>

        <input type="submit" value="Зарегистрироваться" class="btn btn-primary">
    </form>

    <p class="text-muted">
        Уже есть аккаунт?
        <a href="{{ route('auth.signin') }}">Войти</a>
    </p>
</div>
@endsection