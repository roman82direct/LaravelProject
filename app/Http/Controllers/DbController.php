<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    public function index(){
//        $sql = "CREATE TABLE test (
//                id INT PRIMARY KEY  AUTO_INCREMENT,
//                content VARCHAR(50)
//            )
//        ";
//        DB::statement($sql);
//        $sql = "INSERT INTO test (content) VALUES (:content)";
//        DB::insert($sql, [':content' => 'Test news 1']);
//        DB::insert($sql, [':content' => 'Test news 2']);
//        DB::table('news')->delete('2');
//        $res = DB::table('news')->get(['id', 'title']);
//        foreach ($res as $item) {
//            dump($item->id);
//        }
//        $obj = new \stdClass();
//        $obj->test1 = 'Test1 STD';
//        $obj->test2 = 'Test2 STD';
//        dd($res->toArray());
        $res = DB::table('news')
            ->where(['id'=>1])
            ->get();
        dd($res);
    }
}
