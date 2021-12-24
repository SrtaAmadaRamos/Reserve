<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sala', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('numero');
            $table->bigInteger('responsavel_id')->unsigned();
            $table->bigInteger('bloco_id')->unsigned();
            $table->timestamps();
            $table->foreign('responsavel_id')->on('usuarios')->references('id');
            $table->foreign('bloco_id')->on('blocos')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sala');
    }
}
