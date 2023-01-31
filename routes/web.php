<?php

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\OrderSourceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderUploadController;
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


// main route home
Route::get('/', IndexController::class)
    ->name('home');

// admin route
Route::group(['prefix' => 'admin', 'as'=> 'admin.'], static function() {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('source', AdminSourceController::class);
    Route::resource('orders', OrderSourceController::class);
});

// main route news
Route::group(['prefix' => ''], static function(){
    // Вывод новостей
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news'); //именуем роутер
    //Вывод одной новости
    Route::get('/news/{id}/show', [NewsController::class, 'show'])
    ->where('id','\d+') // закрыли окно дебага, при введенём неверном значении
        ->name('news.show');
});

// main route categories
Route::group(['prefix' => ''], static function(){
    Route::get('/categories', [CategoriesController::class, 'index'])
        ->name('categories');
    Route::get('/categories/{id}/show', [CategoriesController::class, 'show'])
        ->where('id', '\d+')
        ->name('categories.show');

});

Route::resource('/feedback', FeedbackController::class);
Route::resource('/upload', OrderUploadController::class);



// Приветствие
Route::get('/hello/{name}', static function (string $name): string {
    return "Hello, {$name}";
});

// Collection
Route::get('/collection', function() {
   $names = ['Ann', 'Billy', 'Sam', 'Jhon', 'Andy', 'Feedy', 'Edd', 'Jil', 'Jeck', 'Freddy'];
   $collect = \collect($names);
   dd($collect);
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
