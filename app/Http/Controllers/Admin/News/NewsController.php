<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use App\Http\Models;

class NewsController extends Controller
{
    public function index(){
        return view('admin/admin', ['message' => 'Welcome, Admin']);
    }

    public function addNews(){
        $categories = (new Models\NewsModel())->getCategories();
        return view('admin/adminAddNews', ['categories' => $categories, 'message'=>'']);
    }

    public function createNews(Request $request){
        $categories = (new Models\NewsModel())->getCategories();
        $arrNews = $request->request->all()['news'];
        $sql = (new Models\Admin\NewsModel())->addNews($arrNews['category'], $arrNews['title'], $arrNews['discription']);
//        dd($sql);
        if ($sql){
            return view('admin/adminAddNews', ['categories' => $categories, 'message' => 'Новость опубликована!!!']);
        }
        else return view('admin/adminAddNews', ['categories' => $categories, 'message' => 'Ошибка публикации!!!']);
    }

    public function deleteNews(Request $request){
        $arrNews = $request->request->all()['news'];
        (new Models\Admin\NewsModel())->delNews($arrNews['id']);
        return view('admin/admin', ['message' => 'Новость удалена']);
    }
}
