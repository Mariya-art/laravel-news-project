@extends('layouts.admin')

@section('title')
    Админка - Категории
@endsection

@section('header')
    <h1 class="h2">Категории</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.categories.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="table-responsive">
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Название категории</th>
                    <th>Название на рус.языке</th>
                    <th>Опции</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->rus_name }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Ред.</a>
                            <a href="javascript:;" style="color:red;">Уд.</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">Записей нет</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection