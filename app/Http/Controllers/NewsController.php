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
//        dd($sortNews);
        return view('news', ['sortNews' => $sortNews, 'category_Id' => $categoryId]);
    }
}
