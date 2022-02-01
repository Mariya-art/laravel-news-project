@extends('layouts.admin')

@section('title')
    Админка - Добавить источник
@endsection

@section('header')
    <h1 class="h2">Добавить источник</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2"></div>
    </div>
@endsection

@section('content')
    @include('inc.message')
    <div>
        <form method="post" action="{{ route('admin.sources.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Источник</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"><br>

                <label for="real_name">Название бренда</label>
                <input type="text" class="form-control" name="real_name" id="real_name" value="{{ old('real_name') }}"><br>

                <label for="site">Сайт</label>
                <input type="text" class="form-control" name="site" id="site" value="{{ old('site') }}"><br>

                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status') === 'Active') selected @endif>Active</option>
                    <option @if(old('status') === 'Blocked') selected @endif>Blocked</option>
                </select><br>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection 