@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Заказ на получение выгрузки данных</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div>
        <form method="post" action="{{ route('upload.store') }}">
            @csrf
            <div class="form-group">
                <label for="user">Ваше имя</label>
                <input type="text" id="user" name="user" value="{{ old('user') }}" class="form-control" placeholder="Введите имя пользователя">
            </div>
            <div class="form-group">
                <label for="phone">Ваш номер телефона</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Введите номер телефона">
            </div>
            <div class="form-group">
                <label for="email">Ваше Email-адрес</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Введите e-mail">
            </div>
            <div class="form-group">
                <label for="description">Информации о выгрузке</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success button-blue">Отправить</button>
        </form>
    </div>
@endsection
