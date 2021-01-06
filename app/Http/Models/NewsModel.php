<?php


namespace App\Http\Models;

use Illuminate\Support\Facades\DB;
use App\Http\Models;

class NewsModel
{
    public function getCategories(){
        $categories = NewsCategories::all();
        foreach ($categories as $item){
            route('news', ['categoryId' => $item['id']]);
        }
        return $categories;
    }

    public function getOneCategory($catId){
        $categoryItem = NewsCategories::query()
            ->where('id', $catId);
//            ->get();
        return $categoryItem;
    }

    public function getNews(){
        $news = News::all();
        return $news;
    }

    public function getNewsByCategory($categoryId){
        $sortNews = News::query()
            ->where('category_id', $categoryId)
            ->get();
        foreach ($sortNews as $item){
            route('news-item', ['itemId' => $item['id'], 'categoryId' => $categoryId]);
        }
        return $sortNews;
    }

    public function getNewsById($itemId){
        $newsItem = News::query()
            ->where('id', $itemId);
//            ->get();
        return $newsItem;
    }
}
