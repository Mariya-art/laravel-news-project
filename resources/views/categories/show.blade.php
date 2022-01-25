@extends('layouts.main')

@section('title')
    {{ $rus_name }} @parent
@endsection

@section('header')
<div class="row py-lg-1">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{ $rus_name }}</h1>
        <p>
            @foreach($categories as $category)
                <a href="{{ route('categories.show', ['id' => $category['id'], 'name' => $category['name']]) }}" class="btn btn-primary my-2">{{ $category['rus_name'] }}</a>
            @endforeach
            <a href="{{ route('news.index') }}" class="btn btn-secondary my-2">Все новости</a>
        </p>
    </div>
</div>
@endsection

@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
@forelse($news as $newsItem)
    <div class="col">
        <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
                <div class="card-header">
                    <strong>
                        <a href="{{ route('news.show', ['id' => $newsItem['id']]) }}">{{ $newsItem['title'] }}</a>
                    </strong>
                </div>
                <p class="card-text"><em>{{ $newsItem['description'] }}</em></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('news.show', ['id' => $newsItem['id']]) }}" type="button" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                    </div>
                    <small class="text-muted">{{ now('Europe/Moscow') }}</small>
                </div>
            </div>
        </div>
    </div>
@empty
    <h3>Новостей в этой категории нет</h3>
@endforelse
</div>
@endsection 