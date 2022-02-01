@extends('layouts.admin')

@section('title')
    Админка - Редактировать категорию
@endsection

@section('header')
    <h1 class="h2">Редактировать категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2"></div>
    </div>
@endsection

@section('content')
    @include('inc.message')
    <div>
        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Наименование категории</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}"><br>

                <label for="rus_name">Наименование на русском языке</label>
                <input type="text" class="form-control" name="rus_name" id="rus_name" value="{{ $category->rus_name }}"><br>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection 