<?php


namespace App\Http\Models\Admin;

use App\Http\Models;
use App\Http\Models\News;
use Illuminate\Support\Facades\DB;

class NewsModel
{
    public function addNews($categoryId, $title, $text){
        $sql = DB::insert('INSERT INTO `news`(`category_id`, `title`, `source_id`, `text`) VALUES (:categoryId, :title, 1, :txt)', [
            'categoryId' => $categoryId,
            'title' => $title,
            'txt' => $text
        ]);
        return $sql;
    }

    public function editNews($newsId, $title, $text){
        $news = News::query()
            ->where('id', $newsId)
            ->update(['title'=>$title, 'text'=>$text]);
        return $news;
    }

    public function delNews($newsId){
        $sql = DB::delete('DELETE FROM `news` WHERE `id` = :id', ['id'=>$newsId]);
        return $sql;
    }

    public function addCategory($title, $text){
        $sql = DB::insert('INSERT INTO `news_categories`(`title`, `description`) VALUES (?, ?)', [$title, $text]);
        return $sql;
    }
}
