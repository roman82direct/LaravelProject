<?php


namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class NewsModel
/*
 * TODO check 'facade root has not been set'  through test
*/
{
    private $categories;

    private $news;

    public function getCategories(){
        $std = DB::table('news_categories')->get();
//        $std = DB::select('select * from news_categories');
//        $this->categories = $std->toArray();
//        dd($this->categories);
        $this->categories = json_decode(json_encode($std), true);
        return $this->categories;
    }

    public function getOneCategory($catId){
        foreach ($this->getCategories() as $key => $category){
            if($category['id'] == $catId){
                $oneCategory = $category;
            }
        }
        return $oneCategory;
    }

    public function getNews(){
        $std = DB::select('select * from news');
        $this->news = json_decode(json_encode($std), true);
        return $this->news;
    }

    public function getNewsByCategory($categoryId){
        $sortNews = [];
        foreach ($this->getNews() as $key => $item) {
            if ($item['category_id'] == $categoryId){
                array_push($sortNews, $item);
            }
        }
        return $sortNews;
    }

    public function getNewsById($itemId){
        foreach ($this->getNews() as $key => $item) {
            if ($item['id'] == $itemId) {
                $oneNews = $item;
            }
        }
        return $oneNews;
    }
}
