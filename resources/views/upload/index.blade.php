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
                <label for="user_name">Ваше имя</label>
                <input type="text" id="user_name" name="user_name" value="{{ old('user_name') }}" class="form-control @error('user_name') is-invalid @enderror" placeholder="Введите имя пользователя">
            </div>
            <div class="form-group">
                <label for="phone">Ваш номер телефона</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="Введите номер телефона">
            </div>
            <div class="form-group">
                <label for="email">Ваш Email-адрес</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Введите email">
            </div>
            <div class="form-group">
                <label for="category_id">Категории</label>
                <select class="form-control  @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value="0">-- Выбрать --</option>
                    @foreach($listSource as $source)
                        <option @if(old('id') === $source->id) selected @endif value="{{ $source->id }}">{{ $source->name_source }}</option>
                    @endforeach
                </select>
            </div>
{{--            @forelse($listSource as $source)--}}
{{--            <div class="form-group">--}}
{{--                <label for="name_source">Выберите источник</label>--}}
{{--                <textarea class="form-control" id="name_source" name="name_source">{{ $source->name_source->map(fn($item) => $item->name_source)->implode(", ") }}</textarea>--}}
{{--                @empty--}}
{{--                    <label>Записей нет</label>--}}
{{--            </div>--}}
{{--            @endforelse--}}
            <br>
            <button type="submit" class="btn btn-success button-blue">Отправить</button>
        </form>
    </div>
@endsection
