<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Welcome extends Controller
{
    /**
     * @var string
     */
    private $about = 'Welcome to the news agregator!';

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('welcome', ['message' => $this->about]);
    }
}
