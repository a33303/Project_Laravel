@extends('layouts.main')
@section('content')
<div>
    <h2>{{ $listCategories->title }} </h2>
    <p>{!! $listCategories->description !!}</p>
    <div>
        <a href="{{ route('categories') }}">Назад</a>
    </div>
</div>
@endsection
