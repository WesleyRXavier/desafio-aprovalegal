<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetoresFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setores_funcionarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('setorId');
            $table->unsignedBiginteger('funcionarioId');
            $table->timestamps();
            $table->foreign('setorId')->references('id')->on('setores')->Delete('cascade');
            $table->foreign('funcionarioId')->references('id')->on('funcionarios')->Delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setores_funcionarios');
    }
}
