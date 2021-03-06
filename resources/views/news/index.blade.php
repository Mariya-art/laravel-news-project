@extends('layouts.main')

@section('title')
    Все новости @parent
@endsection

@section('header')
<div class="row py-lg-0">
    <div class="col-lg-9 col-md-8 mx-auto">
        <h1 class="fw-light">Все новости</h1>
        @foreach($categories as $category)
            <a href="{{ route('categories.show', ['id' => $category->id, 'name' => $category->name]) }}" class="btn btn-primary my-2">{{ $category->rus_name }}</a>
        @endforeach
        <a href="/" class="btn btn-primary my-2">Все новости</a>
    </div>
</div>
<div class="row py-lg-0">
    <div class="col-lg-9 col-md-8 mx-auto">
        <a href="{{ route('feedback.create') }}" class="btn btn-secondary my-2">Оставить отзыв</a>
        <a href="{{ route('subscription.create') }}" class="btn btn-secondary my-2">Подписаться на новости</a>
    </div>
    @include('inc.message')
</div>
@endsection

@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@forelse($newsList as $news)
    <div class="col">
        <div class="card shadow-sm">
            @isset($news->image)
                <img src="{{ Storage::disk('public')->url($news->image) }}">
                {{-- <img src="{{ $news->image }}" alt="Изображение"> --}}
            @endisset
            @empty($news->image)
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            @endempty

            <div class="card-body">
                <div class="card-header">
                    <strong>
                        <a href="{{ route('news.show', ['news' => $news]) }}">{{ $news->title }}</a>
                    </strong>
                </div>
                <p class="card-text"><em>{{ $news->description }}</em></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('news.show', ['news' => $news]) }}" type="button" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                    </div>
                    <small class="text-muted">{{ $news->created_at }}</small>
                </div>
            </div>
        </div>
    </div>
@empty
    <h3>Новостей нет</h3>
@endforelse

    <div class="col-lg-9 col-md-8 mx-auto">{{ $newsList->links() }}</div>
</div>
@endsection 