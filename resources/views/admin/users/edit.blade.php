@extends('layouts.admin')

@section('title')
    Админка - Редактировать пользователя
@endsection

@section('header')
    <h1 class="h2">Редактировать пользователя</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2"></div>
    </div>
@endsection

@section('content')
    @include('inc.message')
    <div>
        <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя клиента</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror<br>

                <label for="email">Email клиента</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                @error('email') <strong style="color:red;">{{ $message }}</strong> @enderror<br>

                <label for="is_admin">Администрирование</label>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option value=0 @if($user->is_admin === false) selected @endif>Пользователь (не админ)</option>
                    <option value=1 @if($user->is_admin === true) selected @endif>Администратор</option>
                </select><br>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection