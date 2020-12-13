<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $categories = [
        ['id'=>1, 'title' => 'Политика', 'discription' => 'Актуальное о политике'],
        ['id'=>2, 'title' => 'Общество', 'discription' => 'Актуальное в обществе'],
        ['id'=>3, 'title' => 'Спорт', 'discription' => 'Новости спорта'],
        ['id'=>4, 'title' => 'Экономика', 'discription' => 'Новости экономики'],
        ['id'=>5, 'title' => 'Культура', 'discription' => 'Новости культуры']
    ];
    private $news = [
        ['id'=>1, 'category' => 'Политика', 'text' => 'Путин дал неделю на принятие мер...'],
        ['id'=>2, 'category' => 'Политика', 'text' => 'Президент России Владимир Путин потребовал...'],
        ['id'=>3, 'category' => 'Политика', 'text' => 'Путин назвал недопустимым...'],
        ['id'=>4, 'category' => 'Политика', 'text' => 'Путин подчеркнул, что его не устраивают...'],
        ['id'=>5, 'category' => 'Общество', 'text' => 'Цирк танцующих фонтанов в Москве могут оштрафовать...'],
        ['id'=>6, 'category' => 'Общество', 'text' => 'Пациент, с которого началось распространение коронавируса в России...'],
        ['id'=>7, 'category' => 'Общество', 'text' => 'Канцлер Германии Ангела Меркель объявила о введении в Германии жесткого карантина...'],
        ['id'=>8, 'category' => 'Общество', 'text' => '"АвтоВАЗ" полностью завершил выпуск автомобилей Datsun в России...'],
        ['id'=>9, 'category' => 'Спорт', 'text' => 'Цирк танцующих фонтанов в Москве могут оштрафовать...'],
        ['id'=>10, 'category' => 'Спорт', 'text' => 'Пациент, с которого началось распространение коронавируса в России...'],
        ['id'=>11, 'category' => 'Спорт', 'text' => 'Канцлер Германии Ангела Меркель объявила о введении в Германии жесткого карантина...'],
        ['id'=>12, 'category' => 'Спорт', 'text' => '"АвтоВАЗ" полностью завершил выпуск автомобилей Datsun в России...'],
        ['id'=>13, 'category' => 'Экономика', 'text' => 'Путин дал неделю на принятие мер...'],
        ['id'=>14, 'category' => 'Экономика', 'text' => 'Президент России Владимир Путин потребовал...'],
        ['id'=>15, 'category' => 'Экономика', 'text' => 'Путин назвал недопустимым...'],
        ['id'=>16, 'category' => 'Экономика', 'text' => 'Путин подчеркнул, что его не устраивают...'],
        ['id'=>17, 'category' => 'Культура', 'text' => 'Цирк танцующих фонтанов в Москве могут оштрафовать...'],
        ['id'=>18, 'category' => 'Культура', 'text' => 'Пациент, с которого началось распространение коронавируса в России...'],
        ['id'=>19, 'category' => 'Культура', 'text' => 'Канцлер Германии Ангела Меркель объявила о введении в Германии жесткого карантина...'],
        ['id'=>20, 'category' => 'Культура', 'text' => '"АвтоВАЗ" полностью завершил выпуск автомобилей Datsun в России...'],
    ];

    public function getCategories(){
        return $this->categories;
    }

    public function getNews(){
        return $this->news;
    }

}
