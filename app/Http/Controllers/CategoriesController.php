<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        foreach ($this->getCategories() as $category){
            $url = route('news-categories', ['id_category'=>$category['id'], 'title'=>$category['title']]);
        }
        return view('categories', ['categories' => $this->getCategories(), 'url' => $url]);
    }
}
