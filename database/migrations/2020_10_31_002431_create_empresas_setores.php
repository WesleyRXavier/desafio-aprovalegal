<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasSetores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_setores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('empresaId');
            $table->unsignedBiginteger('setorId');
            $table->timestamps();
            $table->foreign('empresaId')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('setorId')->references('id')->on('setores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas_setores');
    }
}
