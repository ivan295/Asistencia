<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_equipo', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_departamento')->unsigned()->index()->nullable();
            $table->foreign('id_departamento')->references('id')->on('department');

            $table->bigInteger('id_marca')->unsigned()->index()->nullable();
            $table->foreign('id_marca')->references('id')->on('marcas');

            $table->string('almacenamiento')->nullable();
            $table->string('espacio_almacenamiento')->nullable();

            $table->bigInteger('id_modelo')->unsigned()->index()->nullable();
            $table->foreign('id_modelo')->references('id')->on('modelos');

            $table->bigInteger('id_procesador')->unsigned()->index()->nullable();
            $table->foreign('id_procesador')->references('id')->on('procesadores');

            $table->bigInteger('id_memoria')->unsigned()->index()->nullable();
            $table->foreign('id_memoria')->references('id')->on('memoria_ram');

            $table->bigInteger('id_sistemaOperativo')->unsigned()->index()->nullable();
            $table->foreign('id_sistemaOperativo')->references('id')->on('sistemas_operativos');

            $table->bigInteger('id_responsable')->unsigned()->index()->nullable();
            $table->foreign('id_responsable')->references('id')->on('users');

            $table->string('nombre_equipo');
            $table->string('cod_cpu')->nullable();
            $table->string('estado_equipo');
            $table->string('tipo_equipo');

            $table->string('observacion')->nullable();
            $table->boolean('estado_eliminado');
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
        Schema::dropIfExists('table_equipo');
    }
}
