<?php

use Illuminate\Database\Seeder;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('sources')->insert(['title'=>'yandex', 'description'=>'www.yandex.ru']);
    }
}
