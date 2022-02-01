@extends('layouts.admin')

@section('title')
    Админка - Редактировать новость
@endsection

@section('header')
    <h1 class="h2">Редактировать новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>
    </div>
@endsection

@section('content')
    @include('inc.message')
    <div>
        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->rus_name }}</option>
                    @endforeach
                </select><br>

                <label for="source_id">Источник</label>
                <select class="form-control" name="source_id" id="source_id">
                    @foreach($sources as $source)
                        <option value="{{ $source->id }}">{{ $source->real_name }}</option>
                    @endforeach
                </select><br>

                <label for="title">Заголовок новости</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}"><br>

                <label for="description">Краткое описание</label>
                <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea><br>

                <label for="fulltext">Полный текст новости</label>
                <textarea class="form-control" name="fulltext" id="fulltext">{!! $news->fulltext !!}</textarea><br>

                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status === 'Draft') selected @endif>Draft</option>
                    <option @if($news->status === 'Active') selected @endif>Active</option>
                    <option @if($news->status === 'Blocked') selected @endif>Blocked</option>
                </select><br>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection