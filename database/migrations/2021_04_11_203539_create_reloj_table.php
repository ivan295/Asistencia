<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelojTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reloj', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha')->nullable();
            $table->time('hora_ingreso')->nullable();
            $table->bigInteger('id_modalidad_ingreso')->unsigned()->index()->nullable();
            $table->foreign('id_modalidad_ingreso')->references('id')->on('modalidad');
            $table->time('hora_descanso')->nullable();
            $table->time('hora_reanudacion')->nullable();
            $table->bigInteger('id_modalidad_reanudacion')->unsigned()->index()->nullable();
            $table->foreign('id_modalidad_reanudacion')->references('id')->on('modalidad');
            $table->time('hora_salida')->nullable();
            $table->string('estado')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();

            $table->bigInteger('id_user')->unsigned()->index();
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reloj');
    }
}
