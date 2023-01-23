<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_nombre');
            $table->string('categoria');
            $table->string('tabla');
            $table->string('descripcion');
            $table->string('siguiente_estado')->nullable();
            $table->string('duracion')->default('no_aplica');
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
        Schema::drop('referencias', function (Blueprint $table) {
            //
        });
    }
}
