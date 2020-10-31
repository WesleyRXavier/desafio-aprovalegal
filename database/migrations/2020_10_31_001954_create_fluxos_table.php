<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFluxosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fluxos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('documentoId');
            $table->unsignedBiginteger('setorOrigemId');
            $table->unsignedBiginteger('setorDestinoId');
            $table->unsignedBiginteger('funcOrigemId');
            $table->unsignedBiginteger('funcDestinoId');
            $table->string('status');
            $table->string('observacao')->nullable();
            $table->timestamps();

            $table->foreign('documentoId')->references('id')->on('documentos')->Delete('cascade');
            $table->foreign('setorOrigemId')->references('id')->on('setores')->Delete('cascade');
            $table->foreign('setorDestinoId')->references('id')->on('setores')->Delete('cascade');
            $table->foreign('funcOrigemId')->references('id')->on('funcionarios')->Delete('cascade');
            $table->foreign('funcDestinoId')->references('id')->on('funcionarios')->Delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fluxos');
    }
}
