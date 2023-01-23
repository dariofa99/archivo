<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcarpetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcarpetas', function (Blueprint $table) {
            $table->increments('id');
           
            $table->integer('padre_id')->unsigned();
            $table->foreign('padre_id')->references('id')->on('carpetas')->onDelete('cascade');
            $table->integer('hija_id')->unsigned();
            $table->foreign('hija_id')->references('id')->on('carpetas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subcarpetas', function (Blueprint $table) {
            //
        });
    }
}
