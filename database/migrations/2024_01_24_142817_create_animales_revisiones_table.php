<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animales_revisiones', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->unsignedBigInteger('animal_id');
            $table->date('fecha');
            $table->timestamps();

            //genero la clave foranea para la tabla animales
            $table->foreign("animal_id")->references("id")->on("animales")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animales_revisiones');
    }
};
