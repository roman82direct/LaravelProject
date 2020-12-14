<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return view('admin', ['message' => 'Welcome, Admin']);
    }

    public function addNews(){
        return view('adminAddNews', []);
    }
}
