<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('apellido')->nullable();
            $table->string('cedula',10)->unique()->nullable();
            $table->string('direccion')->nullable();
            $table->string('sexo',15)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->boolean('estado_eliminado')->nullable();
            $table->timestamps();

            $table->bigInteger('id_tipouser')->unsigned()->index()->nullable();
            $table->foreign('id_tipouser')->references('id')->on('type_users');

            $table->bigInteger('id_edificio')->unsigned()->index()->nullable();
            $table->foreign('id_edificio')->references('id')->on('building');

            $table->bigInteger('id_departamento')->unsigned()->index()->nullable();
            $table->foreign('id_departamento')->references('id')->on('department');

            $table->bigInteger('id_direccion')->unsigned()->index()->nullable();
            $table->foreign('id_direccion')->references('id')->on('direcciones');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
