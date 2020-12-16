<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models;

class NewsController extends Controller
{
    public function index(){
        $news = (new Models\NewsModel())->getCategories();
        foreach ($news as $category){
            route('news', ['categoryId' => $category['id']]);
        }
        return view('newsCategories', ['categories' => $news]);
    }

    public function showNews($categoryId){
        $sortNews = (new Models\NewsModel()) -> getNewsByCategory($categoryId);
        $catDiscription = (new Models\NewsModel()) ->getOneCategory($categoryId)['title'];
        foreach ($sortNews as $item){
            route('news-item', ['itemId' => $item['id'], 'categoryId' => $categoryId]);
        }
//        dd($sortNews);
        return view('news', ['sortNews' => $sortNews, 'category_Id' => $categoryId, 'catDiscr'=>$catDiscription]);
    }

    public function showNewsItem($categoryId, $itemId){
        $news = new Models\NewsModel();
        $newsItem = $news->getNewsById($itemId);
        $catTitle = $news->getOneCategory($categoryId)['title'];
        return view('newsItem', ['newsItem' => $newsItem, 'category'=>$catTitle, 'categoryId'=>$categoryId, 'news_Id' => $itemId]);
    }
}
