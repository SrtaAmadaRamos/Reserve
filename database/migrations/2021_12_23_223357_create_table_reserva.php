<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bloco_id')->unsigned();
            $table->bigInteger('sala_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->time('horarioEntrada');
            $table->time('horarioSaida');
            $table->date('data');
            $table->foreign('bloco_id')->on('blocos')->references('id');
            $table->foreign('sala_id')->on('sala')->references('id');
            $table->foreign('usuario_id')->on('usuarios')->references('id');
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
        Schema::dropIfExists('reserva');
    }
}
