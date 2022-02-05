@extends('layouts.admin')

@section('title')
    Админка - Подписки
@endsection

@section('header')
    <h1 class="h2">Подписки</h1>
@endsection

@section('content')
    <div class="table-responsive">
    @include('inc.message')
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Имя клиента</th>
                    <th>Тел</th>
                    <th>Email</th>
                    <th>Категория новостей</th>
                    <th>Опции</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subscriptions as $subscription)
                    <tr>
                        <td>{{ $subscription->id }}</td>
                        <td>{{ $subscription->name }}</td>
                        <td>{{ $subscription->phone }}</td>
                        <td>{{ $subscription->mail }}</td>
                        <td>{{ $subscription->category_id }}</td>
                        <td>
                            <a href="{{ route('admin.subscriptions.edit', ['subscription' => $subscription]) }}">Ред.</a>
                            <a href="javascript:;" class="delete" rel="{{ $subscription->id }}" style="color:red;">Уд.</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">Записей нет</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $subscriptions->links() }}
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
                        send('/admin/subscriptions/' + id).then(() => {
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