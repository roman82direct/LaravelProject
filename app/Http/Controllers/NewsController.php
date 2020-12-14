<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        foreach ($this->getCategories() as $category){
            route('news', ['categoryId' => $category['id']]);
        }
        return view('categories', ['categories' => $this->getCategories()]);
    }

    public function showNews($categoryId){
        $news = $this->getNews();
        $sortNews = [];
        foreach ($news as $item) {
            if ($item['category_id'] == $categoryId){
                array_push($sortNews, $item);
            }
        }
        foreach ($sortNews as $item){
            route('news-item', ['itemId' => $item['id'], 'categoryId' => $categoryId]);
        }
//        dd($sortNews);
        return view('news', ['sortNews' => $sortNews, 'category_Id' => $categoryId]);
    }

    public function showNewsItem($categoryId, $itemId){
        $categories = $this->getCategories();
        foreach ($categories as $item) {
            if ($item['id'] == $categoryId) {
                $catItem = $item['title'];
            }
        }
        $news = $this->getNews();
        foreach ($news as $item) {
            if ($item['id'] == $itemId){
                $newsItem = $item;
            }
        }
        return view('newsItem', ['newsItem' => $newsItem, 'category'=>$catItem, 'news_Id' => $itemId]);
    }
}
