<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use App\Http\Models;

class NewsController extends Controller
{
    public function index(){
        $content = view('admin/admin', ['message' => 'Welcome, Admin']);
        return $content;
    }

    public function addNews(){
        $categories = (new Models\NewsModel())->getCategories();
        return view('admin/adminAddNews', ['categories' => $categories, 'message'=>'']);
    }

    public function createNews(Request $request){
        $arrNews = $request->request->all()['news'];
        $sql = (new Models\Admin\NewsModel())->addNews($arrNews['category'], $arrNews['title'], $arrNews['discription']);
        if ($sql){
            $content = view('admin/admin', ['message' => 'Новость опубликована', 'action'=> 1]);
        }
        else {
            $content = view('admin/admin', ['message' => 'Ошибка публикации', 'action' => 1]);
        }
//        Передаем заголовки
//        $headers = response($content)->header('newNews', [$arrNews['category'], $arrNews['title'], $arrNews['discription']]);
//        dump($headers);
        return $content;
    }

    public function deleteNews(Request $request){
        $newsId = $request->query('id');
//        dd($arrNews);
        (new Models\Admin\NewsModel())->delNews($newsId);
        return view('admin/admin', ['message' => 'Новость удалена', 'action'=> 1]);
    }

    public function createCategory(Request $request){
        if ($request->isMethod('GET')){
            return view('admin/adminAddCategory');
        } else {
            $newCat = $request->all();
            (new Models\Admin\NewsModel())->addCategory($newCat['title'], $newCat['discr']);
            return view('admin/admin', ['message' => 'Категория "'.$newCat['title'].'" успешно добавлена', 'action' => 1]);
        }
    }
}
