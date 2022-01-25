@extends('layouts.admin')

@section('title')
    Админка - Добавить категорию
@endsection

@section('header')
    <h1 class="h2">Добавить категорию</h1>
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
        <form method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Наименование категории</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"><br>

                <label for="rus_name">Наименование на русском языке</label>
                <input type="text" class="form-control" name="rus_name" id="rus_name" value="{{ old('rus_name') }}"><br>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection 