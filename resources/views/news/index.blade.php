@extends('layouts.main')
@section('content_category')
    <nav class="nav d-flex justify-content-between">
        @forelse($listCategories as $category)
            <div>
                <a href="{{ route('categories.show', ['id' => $category->id]) }}">{{ $category->title }}</a>
            </div>
        @empty
            <p>Нет категорий для новостей</p>
        @endforelse
    </nav>
@endsection
@section('content')
    <div class="row mb-2">
@forelse ($listNews as $news)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">{{ $news->author }}</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="{{ route('news.show', ['id' => $news->id]) }}">{{ $news->title }}</a>
                    </h3>
                    <div class="mb-1 text-muted">{{ $news->created_at }}</div>
                    <p class="card-text mb-auto">{!! $news->description !!}</p>
                    <a href="{{ route('news.show', ['id' => $news->id]) }}">Читать далее</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block"
                     src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($news->image) }}"
                     alt="Card image cap" style="width: 200px">
            </div>
        </div>
@empty
    <h2>Новостей нет</h2>
@endforelse
    </div>
@endsection
