@extends('layouts.base')

@section('title', 'Редактирование пользователя')

@section('content')
<div class="row">
    <div class="col">
        <h1>Редактирование</h1>
        <form action="{{ route('user.update') }}" method="post">
            @csrf
            @method('PUT')
            
            <x-form-field field-name='email' value="{{ $user->email }}" disabled>
                Почта
                <x-slot:help>Изменение почты в данный момент не доступно</x-slot>
            </x-form-field>
            <x-form-field field-name='name' value="{{ old('name', $user->name) }}">Имя</x-form-field>
            <x-form-field field-name='telegram_id' value="{{ old('telegram_id', $user->telegram_id) }}">
                Telegram ID
                <x-slot:help>Уникальный номер в Telegram</x-slot>
            </x-form-field>

            <div class="mb-3">
                <label for="bio" class="form-label">Обо мне</label>
                <textarea class="form-control" id="bio" name="bio">{{ old('bio', $user->bio) }}</textarea>
                @error('bio')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" value="Сохранить" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection