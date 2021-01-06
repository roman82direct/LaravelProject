<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use App\Http\Models;

class NewsController extends Controller
{
    public function index(){
        $news = Models\News::all();
        $categories = Models\NewsCategories::all();
        $sources = Models\Source::all();
        $content = view('admin/admin', [
            'message' => 'Админка',
            'news' => $news,
            'categories' => $categories,
            'sources' => $sources,
            'action'=> 0
        ]);
        return $content;
    }

    public function addNews(){
        $categories = Models\NewsCategories::all();
        return view('admin/adminAddNews', ['categories' => $categories, 'message'=>'']);
    }

    public function createNews(Request $request){
        $arrNews = $request->request->all()['news'];
//        dd($arrNews);
        $sql = (new Models\Admin\NewsModel())->addNews($arrNews['category'], $arrNews['title'], $arrNews['description'], $arrNews['source']);
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

    public function editNews(Request $request)
    {
        if ($request->isMethod('GET')) {
            $news = Models\News::query()->where('id', $request->query('id'));
            return view('admin/editNews', [
                'newsId' => $news->value('id'),
                'title' => $news->value('title'),
                'text' => $news->value('text')
            ]);
        } else {
            $news = $request->all();
            (new Models\Admin\NewsModel())->editNews($news['id'], $news['title'], $news['text']);
            return view('admin/admin', ['message' => 'Новость с id='.$news['id'].' успешно изменена', 'action' => 1]);
        }
    }

    public function deleteNews(Request $request){
        $newsId = $request->query('id');
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
