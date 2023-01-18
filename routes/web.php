<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'index'])
    ->name('home');

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


Route::group(['prefix' => ''], static function(){
    // Вывод новостей
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news'); //именуем роутер

    //Вывод одной новости
    Route::get('/news/{id}/show', [NewsController::class, 'show'])
    ->where('id','\d+') // закрыли окно дебага, при введенём неверном значении
        ->name('news.show');
    Route::get('/create', [NewsController::class, 'create'])
        ->name('create');
});

Route::group(['prefix' => ''], static function(){
    Route::get('/categories', [CategoriesController::class, 'index'])
           ->name('categories');
    Route::get('/categories/{id}/show', [CategoriesController::class, 'show'])
        ->where('id', '\d+')
           ->name('categories.show');
});
