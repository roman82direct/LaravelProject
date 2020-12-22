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
Route::group([
    'prefix' => '/admin',
    'as' => 'admin::news::',
    'namespace' => '\App\Http\Controllers\Admin\News'
], function () {
    Route::get('/admin', 'NewsController@index')
        ->name('index');

//Страница формы для добавления новости
    Route::get('/addnews', 'NewsController@addNews')
        ->name('addNews');
//Страница результата добавления новости
    Route::post('/addnews', 'NewsController@createNews')
        ->name('createNews');
//Страница удаления новости
    Route::post('/delnews', 'NewsController@deleteNews')
        ->name('deleteNews');

});




//Route::get('admin/admin', [
//    'uses' => '\App\Http\Controllers\Admin\News\NewsController@index',
//]);
////Страница добавления новости
//Route::get('admin/addnews', '\App\Http\Controllers\Admin\News\NewsController@addNews')
//    ->name('addNews');


//User Авторизация
Route::get('/signin', [
    'uses' => '\App\Http\Controllers\UserController@index',
]);


//Страница категорий новостей
Route::get('/categories', '\App\Http\Controllers\NewsController@index');

//Страница вывода новостей по категории
Route::get('/categories/category_{categoryId}', '\App\Http\Controllers\NewsController@showNews')
    ->name('news');

//Страница вывода отдельной новости
Route::get('/categories/category_{categoryId}/item_{itemId}', '\App\Http\Controllers\NewsController@showNewsItem')
    ->name('news-item');
 //    ->where('itemId', '[0-9]+');;
