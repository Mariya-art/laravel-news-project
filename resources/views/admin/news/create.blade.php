@extends('layouts.admin')

@section('title')
    Админка - Добавить новость
@endsection

@section('header')
    <h1 class="h2">Добавить новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">

        </div>
    </div>
@endsection

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <div>
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label for="category_id">Номер категории</label>
                <input type="text" class="form-control" name="category_id" id="category_id" value="{{ old('category_id') }}"><br>

                <label for="title">Заголовок новости</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}"><br>

                <label for="description">Краткое описание</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea><br>

                <label for="fulltext">Полный текст новости</label>
                <textarea class="form-control" name="fulltext" id="fulltext">{!! old('fulltext') !!}</textarea><br>

                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status') === 'Draft') selected @endif>Draft</option>
                    <option @if(old('status') === 'Active') selected @endif>Active</option>
                    <option @if(old('status') === 'Blocked') selected @endif>Blocked</option>
                </select><br>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection     