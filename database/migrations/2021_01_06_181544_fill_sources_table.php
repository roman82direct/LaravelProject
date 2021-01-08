<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $model = \App\Http\Models\Source::query();
        $model->insert(['title'=>'yandex', 'description'=>'www.yandex.ru']);
        $model->insert(['title'=>'rbc', 'description'=>'www.rbc.ru']);
        $model->insert(['title'=>'rambler', 'description'=>'www.rambler.ru']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
