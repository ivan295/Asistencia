<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpReanudacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip_reanudacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip',15);
            $table->string('lugar_marcacion',50);
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();

            $table->bigInteger('id_reloj')->unsigned()->index();
            $table->foreign('id_reloj')->references('id')->on('clock');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ip_reanudacion');
    }
}
