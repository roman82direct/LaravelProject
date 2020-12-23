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
//        dd($sortNews);
        foreach ($sortNews as $item){
            route('news-item', ['itemId' => $item['id'], 'categoryId' => $categoryId]);
        }
        return view('news', ['sortNews' => $sortNews, 'category_Id' => $categoryId, 'catDiscr'=>$catDiscription]);
    }

    public function showNewsItem($categoryId, $itemId){
        $news = new Models\NewsModel();
        $newsItem = $news->getNewsById($itemId);
        $catTitle = $news->getOneCategory($categoryId)['title'];
        return view('newsItem', ['newsItem' => $newsItem, 'category'=>$catTitle, 'categoryId'=>$categoryId, 'news_Id' => $itemId]);
    }
    public function saveNews(Request $request){
        if ($request->isMethod('get')){
            return view('user/userSaveRequest', ['news_Id'=>$request->all()['news_id']]);
        } else {
            dump($request->all());
            file_put_contents('data.txt', $request->all()['req']);
            $content = $this->index();
//            dd(response($content));
            return response($content)
                ->header('Content-Type', 'application/txt')
                ->header('Content-Length', mb_strlen($content))
                ->header('Content-Disposition', 'attachment; filename="data.txt"')
                ->header('test', 'TEST');
//                ->download('data.txt');
        }
    }
}
