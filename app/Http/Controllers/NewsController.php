<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models;

class NewsController extends Controller {

    public function welcome(){
    return view('welcome', ['message' => 'Welcome to News Agregator!']);
}

    public function index(){
//        $categories = Models\NewsCategories::all();
        $categories = (new Models\NewsModel())->getCategories();
        foreach ($categories as $category){
            route('news', ['categoryId' => $category['id']]);
        }
        return view('newsCategories', ['categories' => $categories]);
    }

    public function showNews($categoryId){
        $sortNews = Models\News::query()
            ->where('category_id', $categoryId)
            ->get();
        $catDiscription = Models\NewsCategories::query()
            ->where('id', $categoryId)
            ->value('title');

        foreach ($sortNews as $item){
            route('news-item', ['itemId' => $item['id'], 'categoryId' => $categoryId]);
        }
        return view('news', ['sortNews' => $sortNews, 'category_Id' => $categoryId, 'catDiscr'=>$catDiscription]);
    }

    public function showNewsItem($categoryId, $itemId){
//        $news = new Models\NewsModel();
//        $newsItem = $news->getNewsById($itemId);
//        $catTitle = $news->getOneCategory($newsItem['category_id'])['title'];

        $newsItemText = Models\News::query()
            ->where('id', $itemId)
            ->value('text');
        $catTitle = Models\NewsCategories::query()
            ->where('id', $categoryId)
            ->value('title');

        return view('newsItem', ['newsItem' => $newsItemText, 'category'=>$catTitle, 'categoryId'=>$categoryId, 'news_Id' => $itemId]);
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
