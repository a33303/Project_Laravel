@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование заказа</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.orders.update', ['orderSource' => $orderSource]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Имя источника</label>
                <input type="text" id="title" name="title" value="{{ $orderSource->user_name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Имя источника</label>
                <input type="text" id="title" name="title" value="{{ $orderSource->phone }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Имя источника</label>
                <input type="text" id="title" name="title" value="{{ $orderSource->email }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Имя источника</label>
                <input type="text" id="title" name="title" value="{{ $orderSource->name_source }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Имя источника</label>
                <input type="text" id="title" name="title" value="{{ $orderSource->name_source }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Ссылка</label>
                <textarea class="form-control" id="description" name="description">{!! $order->link !!}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Категории</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">-- Выбрать --</option>
                    @foreach($listSource as $source)
                        <option @if(old('id') === $source->id) selected @endif value="{{ $source->id }}">{{ $source->name_source }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
