<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_recetas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('ciudad_recetas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            //$table->text('ingredientes');
            $table->text('descripcion');
            $table->string('imagen');
            $table->string('direccion');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->time('apertura');
            $table->time('cierre');
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que crea la receta');
            $table->foreignId('categoria_id')->references('id')->on('categoria_recetas')->comment('La categoría de la receta');
            $table->foreignId('ciudad_id')->references('id')->on('ciudad_recetas')->comment('La ciudad de la receta');
            $table->timestamps();
        });

        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('telefono');
            $table->time('hora');
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que crea la receta');
            $table->foreignId('receta_id')->references('id')->on('recetas')->comment('El restaurante al que se reserva');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('categoria_recetas');
        Schema::enableForeignKeyConstraints();

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('recetas');
        Schema::enableForeignKeyConstraints();
    }
}
