<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models;

class NewsController extends Controller {

    public function welcome(){
    return view('welcome', ['message' => 'Welcome to News Agregator!']);
}

    public function index(){

        $news = (new Models\NewsModel())->getCategories();
        foreach ($news as $category){
            route('news', ['categoryId' => $category['id']]);
        }
        return view('newsCategories', ['categories' => $news]);
    }

    public function showNews($categoryId){
        $news = new Models\NewsModel();
        $sortNews = $news->getNewsByCategory($categoryId);
        $catDiscription = $news->getOneCategory($categoryId)['title'];
        foreach ($sortNews as $item){
            route('news-item', ['itemId' => $item['id'], 'categoryId' => $categoryId]);
        }
        return view('news', ['sortNews' => $sortNews, 'category_Id' => $categoryId, 'catDiscr'=>$catDiscription]);
    }

    public function showNewsItem($categoryId, $itemId){
        $news = new Models\NewsModel();
        $newsItem = $news->getNewsById($itemId);
        $catTitle = $news->getOneCategory($newsItem['category_id'])['title'];
        return view('newsItem', ['newsItem' => $newsItem, 'category'=>$catTitle, 'categoryId'=>$categoryId, 'news_Id' => $itemId]);
    }
    public function downloadNews(Request $request){
        if ($request->isMethod('get')){
            return view('user/userSaveRequest', ['news_Id'=>$request->all()['news_id']]);
        } else {
            $file = 'userdata/data.txt';
            file_put_contents($file, $request->all()['req']);
            redirect()->route('welcome'); // не работает (как реализовать одновременное скачивание файла и редирект на другую страницу?)
//            dd(response());
            return response()->download($file);
        }
    }
}
