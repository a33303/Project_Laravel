@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom change">
            From the Firehose
        </h3>

        <div class="blog-post">
            <h2 class="blog-post-title">{{ $listNews->title }}</h2>
            <p class="blog-post-meta">{{ $listNews->created_at }}<br><a href="#">{{ $listNews->author }}</a></p>

            {!! $listNews->description !!}<br>
            <a href="{{ route('news') }}">Назад</a>
        </div><!-- /.blog-post -->

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
        <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>
    </aside><!-- /.blog-sidebar -->

</div><!-- /.row -->
@endsection
@push('js')
    <script>
        $(".change").text("Changed text");
    </script>
@endpush
