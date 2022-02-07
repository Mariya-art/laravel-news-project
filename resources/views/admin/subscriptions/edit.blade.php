@extends('layouts.admin')

@section('title')
    Админка - Редактировать подписку
@endsection

@section('header')
    <h1 class="h2">Редактировать подписку</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2"></div>
    </div>
@endsection

@section('content')
    @include('inc.message')
    <div>
        <form method="post" action="{{ route('admin.subscriptions.update', ['subscription' => $subscription]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя подписчика</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $subscription->name }}">
                @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror<br>

                <label for="phone">Номер телефона</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $subscription->phone }}"><br>

                <label for="mail">E-mail</label>
                <input type="text" class="form-control" name="mail" id="mail" value="{{ $subscription->mail }}">
                @error('mail') <strong style="color:red;">{{ $message }}</strong> @enderror<br>

                <label for="category_id">Категория новостей, на которую оформлена подписка</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                        @if($category->id === $subscription->category_id) selected @endif>{{ $category->rus_name }}</option>
                    @endforeach
                </select><br>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection