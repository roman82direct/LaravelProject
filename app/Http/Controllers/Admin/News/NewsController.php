<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsSaveReq;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use App\Http\Models;

class NewsController extends Controller
{
    public function index(){
        $news = Models\News::query()
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('admin/admin', ['news' => $news]);
    }

    public function createNews(){
        return view("admin/adminaddNews", [
                'model' => new Models\News(),
                'id'=>'',
                'categories' => $this->getCategoriesList()
            ]);
    }

    public function saveNews(Request $request){
        $this->validate($request, Models\News::createRules());

        $id = $request->post('id');
        $catId = Models\NewsCategories::query()
            ->where('title', $request->post('category'))
            ->value('id');
        $source = Models\Source::query()
            ->where('title', $request->post('source'))
            ->value('id');
        if(!is_null($source)){
            $sourceId = $source;
        } else {
          Models\Source::query()
              ->insert(['title'=>$request->post('source')]);
          $sourceId = Models\Source::query()
              ->where('title', $request->post('source'))
              ->value('id');
        }
            if (!is_null($id)){
                Models\News::query()->where('id', $id)
                    ->update([
                        'category_id'=>$catId,
                        'title'=>$request->post('title'),
                        'text'=>$request->post('text'),
                        'source_id'=>$sourceId
                    ]);
                $model = Models\News::query()->where('title', $request->post('title'));
            } else {
                Models\News::query()
                    ->insert([
                        'category_id'=>$catId,
                        'title'=>$request->post('title'),
                        'text'=>$request->post('text'),
                        'source_id'=>$sourceId
                    ]);
                $model = Models\News::query()->where('title', $request->post('title'));
            }
        return redirect()->route("admin::news::updateNews", ['id' => $model->value('id')])
            ->with('success', "Данные сохранены");
    }

    public function updateNews($id){
        $news = Models\News::query()
            ->where('id', $id)
            ->value('category_id');
        $catTitle = Models\NewsCategories::query()
            ->where('id', $news)
            ->value('title');

        return view("admin/adminaddNews", [
                'model' => Models\News::query()
                ->where('id', $id),
                'id'=>$id,
                'catTitle' => $catTitle,
                'categories' => $this->getCategoriesList()
            ]
        );
    }

    public function deleteNews($id)
    {
        Models\News::destroy([$id]);
//        return view('admin/admin', ['news' => $news]);
        return redirect()->route("admin::news::index")
            ->with('success', "Данные удалены");
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

    protected function getCategoriesList()
    {
        return Models\NewsCategories::query()
            ->select(['id', 'title'])
            ->get()
            ->pluck('title', 'id');
    }
}
