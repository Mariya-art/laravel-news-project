@extends('layouts.main')

@section('title')
    Подписка на новости @parent
@endsection

@section('header')
<div class="row py-lg-0">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Подписка на новости</h1>
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
        <form method="post" action="{{ route('subscription.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Ваше имя</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"><br>

                <label for="phone">Номер телефона</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}"><br>

                <label for="mail">E-mail</label>
                <input type="text" class="form-control" name="mail" id="mail" value="{{ old('mail') }}"><br>

                <label for="type">Выберите тип новостей, на которые хотите подписаться</label>
                <select class="form-control" name="type" id="type">
                    <option @if(old('type') === 'Политика') selected @endif>Все новости</option>
                    <option @if(old('type') === 'Все новости') selected @endif>Политика</option>
                    <option @if(old('type') === 'Экономика') selected @endif>Экономика</option>
                    <option @if(old('type') === 'Культура') selected @endif>Культура</option>
                    <option @if(old('type') === 'Наука') selected @endif>Наука</option>
                    <option @if(old('type') === 'Спорт') selected @endif>Спорт</option>
                </select><br>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection