@extends('layouts.news')

@section('title')
    {{ $news->title }} @parent
@endsection

@section('content')
<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        @isset($news->image)
            <img src="{{ $news->image }}" alt="Изображение">
        @endisset
        @empty($news->image)
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
        @endempty
    </div>
    <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">{{ $news->title }}</h1>
        <em>{!! $news->description !!}</em>     {{-- скобки {!! !!} используем для вывода тегов, указанных в функции getNewsById() в Controller.php --}}
        <br><br>
        <p class="lead">{{ $news->fulltext }}</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="/" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Все новости</a>
        </div>
    </div>
</div>
@endsection 