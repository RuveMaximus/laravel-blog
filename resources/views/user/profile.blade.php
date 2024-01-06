@extends('layouts.base')

@section('title') Профиль @endsection

@section('content')
<div class="container">
    <div class="row">
        <h1>Профиль</h1>
        {{ $user->name }}
        <a class="btn btn-warning" href="{{ route('user.edit') }}">Изменить данные</a>
    </div>
</div>
@endsection