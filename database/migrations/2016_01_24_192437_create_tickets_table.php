<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descripcion');
            $table->integer('estado_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('operador_id')->unsigned()->nullable(); //Operador al que se le asigna el ticket
            $table->timestamp('operador_at')->nullable(); //Fecha y hora en que es asignado al operador
            $table->timestamp('cierre_at')->nullable(); //Fecha y hora en que el usuario cierra el ticket
            $table->timestamps();

            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('operador_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}
