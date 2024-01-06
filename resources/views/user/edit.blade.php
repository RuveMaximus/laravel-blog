@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Редактирование</h1>
            <form action="" method="post">
                @csrf
                
                <x-form-field field-name='name'>Имя</x-form-field>
            </form>
        </div>
    </div>
</div>
@endsection