@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Источники</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.source.create') }}">Добавить новость</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Источник</th>
                <th>Ссылка</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($listSource as $source)
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->name_source }}</td>
                    <td>{{ $source->link }}</td>
                    <td>{{ $source->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.source.edit', ['source' => $source]) }}">Изм.</a> &nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $source->id }}" style="color: red">Уд.</a>
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
                        send(`/admin/source/${id}`).then(() => {
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
