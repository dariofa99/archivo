<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('codigo');
            $table->string('url_file');
            $table->string('file_name');
            $table->date('fecha_cambio_estado');            
            $table->integer('documento_id')->unsigned();
            $table->foreign('documento_id')->references('id')->on('referencias')->onDelete('cascade');
            $table->integer('carpeta_id')->unsigned();
            $table->foreign('carpeta_id')->references('id')->on('carpetas')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
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
        Schema::drop('archivos', function (Blueprint $table) {
            //
        });
    }
}
