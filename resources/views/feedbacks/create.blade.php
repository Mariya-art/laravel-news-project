@extends('layouts.main')

@section('title')
    Оставить отзыв @parent
@endsection

@section('header')
<div class="row py-lg-0">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Оставить отзыв</h1>
    </div>
</div>
@endsection

@section('content')
    @include('inc.message')
    <div>
        <form method="post" action="{{ route('feedback.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Ваше имя</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror<br>

                <label for="feedback">Ваш отзыв</label>
                <textarea class="form-control" name="feedback" id="feedback">{!! old('feedback') !!}</textarea>
                @error('feedback') <strong style="color:red;">{{ $message }}</strong> @enderror<br>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection