@extends('layouts.admin')

@section('title')
    Админка - Главная
@endsection

@section('header')
    <h1 class="h2">Панель администратора</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2"></div>
    </div>
@endsection

@section('content')
    <h5>Примеры сообщений:</h5>
    <x-alert type="success" message="Сообщение успешно добавлено"></x-alert>
    <x-alert type="warning" message="Предупреждение!"></x-alert>
    <x-alert type="danger" message="Критическая ошибка"></x-alert>
@endsection 