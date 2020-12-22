<?php


namespace App\Http\Models\Admin;

use Illuminate\Support\Facades\DB;

class NewsModel
{
    private $categories;
    private $news;

    public function addNews($categoryId, $title, $text){
        $sql = DB::insert('INSERT INTO `news`(`category_id`, `title`, `text`) VALUES (:categoryId, :title, :txt)', [
            'categoryId' => $categoryId,
            'title' => $title,
            'txt' => $text
        ]);
        return $sql;
    }

    public function delNews($newsId){
        $sql = DB::delete('DELETE FROM `news` WHERE `id` = :id', ['id'=>$newsId]);
        return $sql;
    }
}
