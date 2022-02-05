@extends('layouts.admin')

@section('title')
    Админка - Редактировать отзыв
@endsection

@section('header')
    <h1 class="h2">Редактировать отзыв</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2"></div>
    </div>
@endsection

@section('content')
    @include('inc.message')
    <div>
        <form method="post" action="{{ route('admin.feedbacks.update', ['feedback' => $feedback]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя клиента</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $feedback->name }}">
                @error('name') <strong style="color:red;">{{ $message }}</strong> @enderror<br>

                <label for="feedback">Отзыв клиента</label>
                <textarea class="form-control" name="feedback" id="feedback">{!! $feedback->feedback !!}</textarea>
                @error('feedback') <strong style="color:red;">{{ $message }}</strong> @enderror<br>

                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($feedback->status === 'New') selected @endif>New</option>
                    <option @if($feedback->status === 'Edited') selected @endif>Edited</option>
                    <option @if($feedback->status === 'Blocked') selected @endif>Blocked</option>
                </select><br>
            </div>
            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
        </form>
    </div>
@endsection