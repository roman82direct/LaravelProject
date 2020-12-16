<?php


namespace App\Http\Models;


class NewsModel
{
    private $categories = [
        ['id'=>1, 'title' => 'Политика', 'discription' => 'Актуальное о политике'],
        ['id'=>2, 'title' => 'Общество', 'discription' => 'Актуальное в обществе'],
        ['id'=>3, 'title' => 'Спорт', 'discription' => 'Новости спорта'],
        ['id'=>4, 'title' => 'Экономика', 'discription' => 'Новости экономики'],
        ['id'=>5, 'title' => 'Культура', 'discription' => 'Новости культуры']
    ];
    private $news = [
        ['id'=>1, 'category_id' => '1', 'text' => 'Путин дал неделю на принятие мер...'],
        ['id'=>2, 'category_id' => '1', 'text' => 'Президент России Владимир Путин потребовал...'],
        ['id'=>3, 'category_id' => '1', 'text' => 'Путин назвал недопустимым...'],
        ['id'=>4, 'category_id' => '1', 'text' => 'Путин подчеркнул, что его не устраивают...'],
        ['id'=>5, 'category_id' => '2', 'text' => 'Цирк танцующих фонтанов в Москве могут оштрафовать...'],
        ['id'=>6, 'category_id' => '2', 'text' => 'Пациент, с которого началось распространение коронавируса в России...'],
        ['id'=>7, 'category_id' => '2', 'text' => 'Канцлер Германии Ангела Меркель объявила о введении в Германии жесткого карантина...'],
        ['id'=>8, 'category_id' => '2', 'text' => '"АвтоВАЗ" полностью завершил выпуск автомобилей Datsun в России...'],
        ['id'=>9, 'category_id' => '3', 'text' => 'Цирк танцующих фонтанов в Москве могут оштрафовать...'],
        ['id'=>10, 'category_id' => '3', 'text' => 'Пациент, с которого началось распространение коронавируса в России...'],
        ['id'=>11, 'category_id' => '3', 'text' => 'Канцлер Германии Ангела Меркель объявила о введении в Германии жесткого карантина...'],
        ['id'=>12, 'category_id' => '3', 'text' => '"АвтоВАЗ" полностью завершил выпуск автомобилей Datsun в России...'],
        ['id'=>13, 'category_id' => '4', 'text' => 'Путин дал неделю на принятие мер...'],
        ['id'=>14, 'category_id' => '4', 'text' => 'Президент России Владимир Путин потребовал...'],
        ['id'=>15, 'category_id' => '4', 'text' => 'Путин назвал недопустимым...'],
        ['id'=>16, 'category_id' => '4', 'text' => 'Путин подчеркнул, что его не устраивают...'],
        ['id'=>17, 'category_id' => '5', 'text' => 'Цирк танцующих фонтанов в Москве могут оштрафовать...'],
        ['id'=>18, 'category_id' => '5', 'text' => 'Пациент, с которого началось распространение коронавируса в России...'],
        ['id'=>19, 'category_id' => '5', 'text' => 'Канцлер Германии Ангела Меркель объявила о введении в Германии жесткого карантина...'],
        ['id'=>20, 'category_id' => '5', 'text' => '"АвтоВАЗ" полностью завершил выпуск автомобилей Datsun в России...'],
    ];

    public function getCategories(){
        return $this->categories;
    }

    public function getOneCategory($catId){
        foreach ($this->categories as $category){
            if($category['id'] == $catId){
                $oneCategory = $category;
            }
        }
        return $oneCategory;
    }

    public function getNews(){
        return $this->news;
    }

    public function getNewsByCategory($categoryId){
        $sortNews = [];
        foreach ($this->news as $item) {
            if ($item['category_id'] == $categoryId){
                array_push($sortNews, $item);
            }
        }
        return $sortNews;
    }

    public function getNewsById($itemId){
        foreach ($this->news as $item) {
            if ($item['id'] == $itemId) {
                $oneNews = $item;
            }
        }
        return $oneNews;

    }
}
