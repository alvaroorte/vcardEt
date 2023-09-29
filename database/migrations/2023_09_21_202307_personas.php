<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('correo')->unique();
            $table->string('celular');
            $table->string('telefono')->nullable();
            $table->string('interno')->nullable();
            $table->string('fax')->nullable();
            $table->string('cargo');
            $table->text('foto')->nullable();
            $table->text('fondo')->nullable();
            $table->string('identificador');
            $table->unsignedBigInteger('id_empresa');
            $table->timestamps();

            $table->foreign('id_empresa')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
};
