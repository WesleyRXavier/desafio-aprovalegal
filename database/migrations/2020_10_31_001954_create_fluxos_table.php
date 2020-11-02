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
            $table->string('setorOrigem');
            $table->string('setorDestino');
            $table->string('funcOrigem');
            $table->string('funcDestino');
            $table->string('status');
            $table->string('observacao')->nullable();
            $table->timestamps();

            $table->foreign('documentoId')->references('id')->on('documentos')->onDelete('cascade');

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
