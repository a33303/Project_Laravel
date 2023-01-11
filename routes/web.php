<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Приветствие
Route::get('/hello/{name}', static function (string $name): string {
    return "Hello, {$name}";
});

// Вывод новостей
$text = "This is my project Laravel to learn Framework!";
Route::get('/project', static function () use ($text): string {
    return <<<php
    <!doctype  html>
    <html lang="en">
    <head>
        <meta charset='UTF-8'>
    </head>
    <body>
        <h1>$text</h1>
    </body>
    </html>
    php;
});

// Вывод новостей
Route::get('/news', static function (): string {
    return "News to Day!";
});

//Вывод одной новости
Route::get('/news/{id}', static function (int $id): string {
    return "News with #ID {$id}";
});

