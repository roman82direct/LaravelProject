<?php

use Illuminate\Support\Facades\Auth;
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
    'uses' => '\App\Http\Controllers\NewsController@welcome',
])
    ->name('welcome');

//Админка
Route::group([
    'prefix' => '/admin',
    'as' => 'admin::news::',
    'namespace' => '\App\Http\Controllers\Admin\News'
], function () {
    Route::get('/', 'NewsController@index')
        ->name('index');

//Страница результата добавления новости
    Route::match(['get','post'], '/create', 'NewsController@createNews')
        ->name('createNews');

    Route::match(['post'], '/save', 'NewsController@saveNews')
        ->name('saveNews');

    Route::get('/update/{id}', 'NewsController@updateNews')
        ->name('updateNews');

//Страница удаления новости
    Route::get('/delete/{id}', 'NewsController@deleteNews')
        ->name('deleteNews');

//  Открытие формы и создание новостной категории
    Route::match(['GET', 'POST'], '/addcategory', 'NewsController@createCategory')
    ->name('createCategory');

});

//User Авторизация
Route::get('user/signin', [
    'uses' => '\App\Http\Controllers\UserController@index',
]);
// User запрос на скачивание файла
Route::match(['GET', 'POST'], '/downloadnews', '\App\Http\Controllers\NewsController@downloadNews')
    ->name('saveNewsToFile');


//Страница категорий новостей
Route::get('/categories', '\App\Http\Controllers\NewsController@index');

//Страница вывода новостей по категории
Route::get('/categories/category_{categoryId}', '\App\Http\Controllers\NewsController@showNews')
    ->name('news');

//Страница вывода отдельной новости
Route::get('/categories/category_{categoryId}/item_{itemId}', '\App\Http\Controllers\NewsController@showNewsItem')
    ->name('news-item');
 //    ->where('itemId', '[0-9]+');;

Route::get('/db', '\App\Http\Controllers\DbController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

//Route::get('login', '\App\Http\Controllers\Auth\LoginController@showLoginForm')
//    ->name('login');
//Route::post('login', '\App\Http\Controllers\Auth\LoginController@login');
//Route::post('logout', '\App\Http\Controllers\Auth\LoginController@logout')
//    ->name('logout');
