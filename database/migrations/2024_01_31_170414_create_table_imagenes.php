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
        Schema::create('imagenes', function (Blueprint $table) {
                $table->id();
            $table->string('nombre');
            $table->string('url');
            $table->timestamps();
            $table->unsignedBigInteger('animal_id')->nullable();
            // UNA imagen pertenece a UN animal y UN animal tiene UNA imagen
            // El campo 'animal_id' hará referencia al campo 'id' de la tabla animales
            $table->foreign('animal_id')->references('id')->on('animales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
