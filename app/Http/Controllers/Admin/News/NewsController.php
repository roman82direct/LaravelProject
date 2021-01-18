<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsSaveReq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use App\Http\Models;
use App\Http\Models\News;
use App\Http\Models\NewsCategories;
use App\Http\Models\Source;

class NewsController extends Controller
{
    public function index(){
        $news = News::query()
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        return view('admin/admin', ['news' => $news]);
    }

    public function createNews(){
        return view("admin/adminaddNews", [
                'model' => new News(),
                'id'=>'',
                'categories' => $this->getCategoriesList()
            ]);
    }

    public function saveNews(Request $request)
    {
        $this->validate($request, News::createRules());
        $model = (new Models\Admin\NewsModel())->saveNews($request);
        return redirect()->route("admin::news::updateNews", ['id' => $model->id])
            ->with('success', "Данные сохранены");
    }

    public function updateNews($id)
    {
        return view("admin/adminaddNews", [
                'model' => News::find($id),
                'categories' => $this->getCategoriesList()
            ]
        );
    }

    public function deleteNews($id)
    {
        Models\News::destroy([$id]);
        return redirect()->route("admin::news::index")
            ->with('success', "Данные удалены");
    }

    public function createCategory(Request $request){
        if ($request->isMethod('POST')){
            $newCat = $request->all();
            (new Models\Admin\NewsModel())->addCategory($newCat['title'], $newCat['discr']);
            return redirect()->route("admin::news::index")
                ->with('success', "Новая категория новостей сохранена");
        } else {
            return view('admin/adminAddCategory');
        }
    }

    protected function getCategoriesList()
    {
        return Models\NewsCategories::query()
            ->select(['id', 'title'])
            ->get()
            ->pluck('title', 'id');
    }
}
