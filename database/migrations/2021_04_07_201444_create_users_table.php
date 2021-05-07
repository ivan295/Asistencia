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
            $table->string('sexo')->nullable();
            $table->string('email')->unique()->nullable();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamps();

            $table->bigInteger('id_tipouser')->unsigned()->index()->nullable();
            $table->foreign('id_tipouser')->references('id')->on('type_users');

            $table->bigInteger('id_edificio')->unsigned()->index()->nullable();
            $table->foreign('id_edificio')->references('id')->on('edificio');

            $table->bigInteger('id_departamento')->unsigned()->index()->nullable();
            $table->foreign('id_departamento')->references('id')->on('departamento');

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
