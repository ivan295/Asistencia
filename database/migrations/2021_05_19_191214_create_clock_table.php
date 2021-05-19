<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha')->nullable();
            $table->time('hora_ingreso')->nullable();
            $table->bigInteger('id_modalidad_ingreso')->unsigned()->index()->nullable();
            $table->foreign('id_modalidad_ingreso')->references('id')->on('modality');
            $table->time('hora_descanso')->nullable();
            $table->time('hora_reanudacion')->nullable();
            $table->bigInteger('id_modalidad_reanudacion')->unsigned()->index()->nullable();
            $table->foreign('id_modalidad_reanudacion')->references('id')->on('modality');
            $table->time('hora_salida')->nullable();
            $table->string('ip',10)->nullable();
            $table->boolean('estado_eliminado')->nullable();
            $table->timestamps();

            $table->bigInteger('id_user')->unsigned()->index();
            $table->foreign('id_user')->references('id')->on('users');

            $table->bigInteger('id_estado_asistencia')->unsigned()->index()->nullable();
            $table->foreign('id_estado_asistencia')->references('id')->on('assistance_status');

            $table->bigInteger('id_estado_registro')->unsigned()->index()->nullable();
            $table->foreign('id_estado_registro')->references('id')->on('register_status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clock');
    }
}
