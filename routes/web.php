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
Route::get('/about', function () {
    $about = 'Now create something great! Transitioning states is accomplished by defining the transition logic in a specific state machine.';
    return view('about', ['message' => $about]);
});

Route::get('/news', function () {
    $site = 'https://ria.ru/';
    $html = file_get_contents($site);

    $doc = phpQuery::newDocument('<meta charset="utf-8">' . $html);
    $newsItems = $doc->find('.cell-list__list');

    $news = array();
    foreach ($newsItems as $newsItem) {

        $newsElem = pq($newsItem)->find('a');

        $title = $newsElem->text();
        $link = $newsElem->attr('href');

        if (strpos($link, $site) === false) {
            $link = $site . $link;
        }

        array_push($news, array(
            'title' => $title,
            'link' => $link
        ));
    }
    return view('news', ['site'=>$site,'news'=>$news]);
});
