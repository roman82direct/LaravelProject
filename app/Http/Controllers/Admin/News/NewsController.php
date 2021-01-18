<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsSaveReq;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use App\Http\Models;
use App\Http\Models\News;
use App\Http\Models\NewsCategories;
use App\Http\Models\Source;

class NewsController extends Controller
{
    public function index(){
//        $news = new Models\News();
//        dd(Models\News::find(13)->title);

//        $news->fill(['category_id'=>1, 'title'=>'Title', 'text'=>'hzscbvhgvhgzsvchg'])
//        ->save();
//        $item = Models\News::find(2);
//        dd($item->text);


        $news = Models\News::query()
            ->orderBy('updated_at', 'desc')
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

    public function saveNews(Request $request)
    {
        $this->validate($request, Models\News::createRules());

        $catId = NewsCategories::whereTitle($request->post('category'))->value('id');
        $sourceId = Source::whereTitle($request->post('source'))->value('id');

        $id = $request->post('id');
        $model = $id ? News::find($id) : new Models\News();
        $model->fill([
            "title" => $request->post('title'),
            "category_id" => $catId,
            "text" => $request->post('text'),
            "source_id" => $sourceId
        ])->save();

        return redirect()->route("admin::news::updateNews", ['id' => $model->id])
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
