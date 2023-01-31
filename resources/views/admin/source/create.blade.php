@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.source.store') }}">
            @csrf
            <div class="form-group">
                <label for="name_source">Имя источника</label>
                <input type="text" id="name_source" name="name_source" value="{{ old('name_source') }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="link">Ссылка</label>
                <textarea class="form-control" id="link" name="link">{!! old('link') !!}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
        </form>
    </div>
@endsection
