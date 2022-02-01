@extends('layouts.admin')

@section('title')
    Админка - Источники
@endsection

@section('header')
    <h1 class="h2">Источники</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.sources.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить источник</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="table-responsive">
    @include('inc.message')
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Кол-во новостей</th>
                    <th>Источник</th>
                    <th>Название бренда</th>
                    <th>Сайт</th>
                    <th>Статус</th>
                    <th>Опции</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sources as $source)
                    <tr>
                        <td>{{ $source->id }}</td>
                        <td>{{ optional($source->news)->count() }}</td>
                        <td>{{ $source->name }}</td>
                        <td>{{ $source->real_name }}</td>
                        <td>{{ $source->site }}</td>
                        <td>{{ $source->status }}</td>
                        <td>
                            <a href="{{ route('admin.sources.edit', ['source' => $source]) }}">Ред.</a>
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