<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tableip', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip',20);

            $table->bigInteger('id_edificio')->unsigned()->index()->nullable();
            $table->foreign('id_edificio')->references('id')->on('building');
            
            $table->bigInteger('id_equipo')->unsigned()->index()->nullable();
            $table->foreign('id_equipo')->references('id')->on('table_equipo');

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
        Schema::dropIfExists('tableip');
    }
}
