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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sala_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->time('horarioEntrada');
            $table->time('horarioSaida');
            $table->date('data');
            $table->foreign('sala_id')->on('salas')->references('id');
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
        Schema::dropIfExists('reservas');
    }
}
