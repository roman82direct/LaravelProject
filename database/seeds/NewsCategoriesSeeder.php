<?php

use Illuminate\Database\Seeder;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('news_categories')->insert(['title'=>'Спорт', 'description'=>'Новости Спорта']);
    }
}
