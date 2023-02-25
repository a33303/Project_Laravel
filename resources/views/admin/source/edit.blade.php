@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать источник</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.source.update', ['source' => $source]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name_source">Имя источника</label>
                <input type="text" id="name_source" name="name_source" value="{{ $source->name_source }}" class="form-control @error('name_source') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="link">Ссылка</label>
                <textarea class="form-control @error('link') is-invalid @enderror" id="link" name="link">{!! $source->link !!}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
            <br>
            <button class="btn btn-danger">
                <a href="{{ route('admin.source.index') }}" style="text-decoration: none; color: #EEEEEE">Отменить</a>
            </button>
    </div>
@endsection
