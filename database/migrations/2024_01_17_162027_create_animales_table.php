<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * id
especie String – clave unica
slug String – clave unica
peso Doble de 6 dígitos con 1 de precisión
altura Doble de 6 dígitos con 1 de precisión
fechaNacimiento Date
imagen String (puede ser null)
alimentacion String de 20 caracteres (puede ser null)
descripcion Texto largo (puede ser null)
timestamps Timestamps de Eloquent
     */
    public function up(): void
    {
        Schema::create('animales', function (Blueprint $table) {
            $table->id();
            $table->string('especie')->unique();
            $table->string('slug')->unique();
            $table->double('peso',6,1);
            $table->double('altura',6,1);
            $table->date('fechaNacimiento');
            $table->string('imagen')->nullable();
            $table->string('alimentacion',20)->nullable();
            $table->longText('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animales');
    }
};
