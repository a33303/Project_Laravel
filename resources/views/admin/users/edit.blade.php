@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать Пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="is_admin">Роль</label>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option @if($user->is_admin) selected @endif value="{{ $user->is_admin }}">Администратор</option>
                    <option @if(!$user->is_admin) selected @endif value="0">Пользователь</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror">
            </div>

            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
            <br>
            <button class="btn btn-danger">
                <a href="{{ route('admin.users.index') }}" style="text-decoration: none; color: #EEEEEE">Отменить</a>
            </button>
    </div>
@endsection
