@extends('layouts.main')
@section('content')
    <div>
        <h3>Добро пожаловать на сайт новостей!</h3>
        <p>Выберете нужную Вам категорию</p>
    </div>
    <div class="modal-dialog-centered modal-dialog-scrollable" >
        <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="btn btn-sm btn-outline-secondary" href="/news">Новости дня</a>
       </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="btn btn-sm btn-outline-secondary" href="/categories">Категории новостей</a>
        </div>
    </div>
    <div class="modal-dialog-centered modal-dialog-scrollable" >
        <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="btn btn-sm btn-outline-secondary" href="/feedback">Оставить отзыв</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="btn btn-sm btn-outline-secondary" href="/upload">Заказать выгрузку</a>
        </div>
    </div>
@endsection
