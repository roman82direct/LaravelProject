<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillSourcesTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $model = new \App\Http\Models\Source();
        $model->fill(['title'=>'mail', 'description'=>'www.mail.ru']);
        $model->fill(['title'=>'google', 'description'=>'www.google.com']);
        $model->save();
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
