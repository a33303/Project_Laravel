@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Заказы выгрузки данных</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>ФИО</th>
                <th>Телефон</th>
                <th>Почта</th>
                <th>Источник данных</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($listOrderSource as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->source }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.orders.edit', ['order' => $order]) }}">Изм.</a> &nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $order->id }}" style="color: red">Уд.</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function (){
            let elements =document.querySelectorAll(".delete");
            elements.forEach(function (e, k){
                e.addEventListener("click", function(){
                    const id = this.getAttribute('rel');
                    if(confirm(`Подтверждаете удаление записи с #ID = {$id}`)){
                        send(`/admin/orders/${id}`).then(() => {
                            location.reload();
                        });
                    } else {
                        alert("Удаление отменено");
                    }
                });
            });
        });

        async function send(url){
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
