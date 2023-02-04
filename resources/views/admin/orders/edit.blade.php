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
                <input type="text" id="title" name="title" value="{{ $orderSource->user_name }}" class="form-control @error('title') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="phone">Имя источника</label>
                <input type="text" id="phone" name="phone" value="{{ $orderSource->phone }}" class="form-control @error('phone') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="email">Имя источника</label>
                <input type="text" id="email" name="email" value="{{ $orderSource->email }}" class="form-control @error('email') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="name_source">Имя источника</label>
                <input type="text" id="name_source" name="name_source" value="{{ $orderSource->name_source }}" class="form-control @error('name_source') is-invalid @enderror">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
