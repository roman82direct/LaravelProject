<?php
require $_SERVER['DOCUMENT_ROOT'] .'/app/Models/M_Parser.php';
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
Route::get('/about', function () {
    $about = 'Now create something great! Transitioning states is accomplished by defining the transition logic in a specific state machine.';
    return view('about', ['message' => $about]);
});

Route::get('/news', function () {
    $site = 'https://ria.ru/';
    $container = '.cell-list__list';
    $link = 'a';

    $parse = new M_Parser($site, $container, $link);
    $news = $parse->parse();

    return view('news', ['site'=>$site,'news'=>$news]);
});
