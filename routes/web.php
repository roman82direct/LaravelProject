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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [
    'uses' => '\App\Http\Controllers\WelcomeController@index',
]);

//Админка
Route::get('/admin', [
    'uses' => '\App\Http\Controllers\Admin\NewsController@index',
]);

//Авторизация
Route::get('/signin', [
    'uses' => '\App\Http\Controllers\UserController@index',
]);

//Страница категорий новостей
Route::get('/categories', '\App\Http\Controllers\NewsController@index');

//Страница вывода новостей по категории
Route::get('/categories/category_{categoryId}', '\App\Http\Controllers\NewsController@showNews')
    ->name('news');

//Страница добавления новости
Route::get('/addnews', '\App\Http\Controllers\Admin\NewsController@addNews');

//Страница вывода отдельной новости
Route::get('/categories/category_{categoryId}/item_{itemId}', '\App\Http\Controllers\NewsController@showNewsItem')
    ->name('news-item');
 //    ->where('itemId', '[0-9]+');;
