<?php


namespace App\Http\Models\Admin;

use App\Http\Models;
use App\Http\Models\News;
use Illuminate\Support\Facades\DB;

class NewsModel
{
    public function addNews($categoryId, $title, $text, $source){
        $sources = Models\Source::query()
            ->where('title', $source);

        if ($sources->value('id')){
            $sourceId = $sources->value('id');
        } else {
            Models\Source::query()
                ->insert(['title'=>$source]);

            $sourceId = Models\Source::query()
                ->where('title', $source)
                ->value('id');
        }
        $sql = DB::insert('INSERT INTO `news`(`category_id`, `title`, `source_id`, `text`) VALUES (:categoryId, :title, :sourceId, :txt)', [
            'categoryId' => $categoryId,
            'title' => $title,
            'sourceId' => $sourceId,
            'txt' => $text
        ]);
        return $sql;
    }

    public function saveNews($id, $caregoryTxt, $sourceTxt){

        $catId = Models\NewsCategories::find('title', $caregoryTxt)->id;
        $source = Models\Source::find('title', $sourceTxt)->id;
        if(!is_null($source)){
            $sourceId = $source;
        } else {
            Models\Source::fill(['title'=>$sourceTxt])->save();
            $sourceId = Models\Source::find('title', $sourceTxt)->id;
        }
        if (!is_null($id)){
            $title = News::find($id)->title;
            $text = News::find(($id))->text;
            $model = News::find($id)->fill([
                'category_id'=>$catId,
                'title'=>$title,
                'text'=>$text,
                'source_id'=>$sourceId
            ])->save();
        } else {
            $model = News::fill([
                    'category_id'=>$catId,
                    'title'=>$title,
                    'text'=>$text,
                    'source_id'=>$sourceId
                ])->save();
        }
        return $model;
    }

    public function editNews($newsId, $title, $text){
        $news = News::query()                       //Eloquent ORM
            ->where('id', $newsId)
            ->update(['title'=>$title, 'text'=>$text]);
        return $news;
    }

    public function delNews($newsId){
        $sql = News::query()
            ->where('id', $newsId)
            ->delete();
//        $sql = DB::delete('DELETE FROM `news` WHERE `id` = :id', ['id'=>$newsId]);
        return $sql;
    }

    public function addCategory($title, $text){
        $sql = Models\NewsCategories::query()
            ->insert(['title'=>$title, 'description'=>$text]);
//        $sql = DB::insert('INSERT INTO `news_categories`(`title`, `description`) VALUES (?, ?)', [$title, $text]);
        return $sql;
    }
}
