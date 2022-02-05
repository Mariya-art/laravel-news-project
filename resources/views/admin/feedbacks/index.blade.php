@extends('layouts.admin')

@section('title')
    Админка - Отзывы
@endsection

@section('header')
    <h1 class="h2">Отзывы</h1>
@endsection

@section('content')
    <div class="table-responsive">
    @include('inc.message')
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Имя клиента</th>
                    <th>Отзыв</th>
                    <th>Статус</th>
                    <th>Опции</th>
                </tr>
            </thead>
            <tbody>
                @forelse($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->name }}</td>
                        <td>{{ $feedback->feedback }}</td>
                        <td>{{ $feedback->status }}</td>
                        <td>
                            <a href="{{ route('admin.feedbacks.edit', ['feedback' => $feedback]) }}">Ред.</a>
                            <a href="javascript:;" class="delete" rel="{{ $feedback->id }}" style="color:red;">Уд.</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">Записей нет</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $feedbacks->links() }}
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
            el.forEach(function (e, k) {
                e.addEventListener('click', function() {
                    const id = e.getAttribute("rel");
                    if(confirm("Подтверждаете удаление записи с #ID = " + id + "?")) {
                        send('/admin/feedbacks/' + id).then(() => {
                            location.reload();
                        });
                    }
                });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush