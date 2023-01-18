<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index(): string
    {
        return <<<php
        <h1>Добро пожаловать!</h1>
        Последние новости<br><br>
        <a href="/news">Посмотреть новости</a><br>
        <a href="/categories">Категории новостей</a>
        php;
    }
}
