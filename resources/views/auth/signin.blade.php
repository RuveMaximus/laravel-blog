@extends('base')

@section('title') Вход @endsection

@section('content')
    Нет аккаунта?
    <a href="{{ route('auth.signup') }}">Зарегистрироваться</a>
@endsection