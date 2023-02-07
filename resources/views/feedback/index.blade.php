@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Форма обратной связи</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div>
        <form method="post" action="{{ route('feedback.store') }}">
            @csrf
            <div class="form-group">
                <label for="user">Имя пользователя</label>
                <input type="text" id="user" name="user" value="{{ old('user') }}" class="form-control @error('user') is-invalid @enderror" placeholder="Введите имя пользователя">
            </div>
            <div class="form-group">
                <label for="description">Комментарий</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Оставьте или комментарий отзыв по работе проекта">{{ old('description') }}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success button-blue">Отправить</button>
        </form>
    </div>
@endsection
