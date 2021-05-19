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
            $table->string('ip');
            $table->string('observacion')->nullable();
            $table->boolean('estado_eliminado')->nullable();
            $table->timestamps();

            $table->bigInteger('id_edificio')->unsigned()->index()->nullable();
            $table->foreign('id_edificio')->references('id')->on('building');

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
