<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Categories extends Controller
{
    public function index(){
        return view('categories', ['categories' => $this->getCategories()]);
    }
}
