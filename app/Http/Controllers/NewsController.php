<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models;

class NewsController extends Controller {

    public function welcome(){
    return view('welcome', ['message' => 'Welcome to News Agregator!']);
}

    public function index(){
        $categories = (new Models\NewsModel())->getCategories();
        return view('newsCategories', ['categories' => $categories]);
    }

    public function showNews($categoryId){
        $model = new Models\NewsModel();
        $sortNews = $model->getNewsByCategory($categoryId);
        $catDescription = $model->getCategoryById($categoryId)->value('title');
        return view('news', [
            'sortNews' => $sortNews,
            'category_Id' => $categoryId,
            'catDiscr'=>$catDescription
        ]);
    }

    public function showNewsItem($categoryId, $itemId){
        $model = new Models\NewsModel();
        $newsItemText = $model->getNewsById($itemId)->value('text');
        $catTitle = $model->getCategoryById($categoryId)->value('title');
        return view('newsItem', [
            'newsItem' => $newsItemText,
            'category'=>$catTitle,
            'categoryId'=>$categoryId,
            'news_Id' => $itemId
        ]);
    }

    public function downloadNews(Request $request){
        if ($request->isMethod('post')){
            $file = 'userdata/data.txt';
            file_put_contents($file, $request->all()['req']);
//            redirect()->route('welcome'); // не работает (как реализовать одновременное скачивание файла и редирект на другую страницу?)
//            dd(response());
            return response()->download($file);
        } else {
            return view('user/userSaveRequest', ['news_Id'=>$request->all()['news_id']]);
        }
    }
}
