<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('animales', function (Blueprint $table) {
            $table->unsignedBigInteger('imagen_id')->nullable();
            // UN animal tiene UNA imagen y UNA imagen pertenece a UN animal
            // El campo 'imagen_id' hace referencia al campo 'id' de la tabla imagenes
            $table->foreign('imagen_id')->references('id')->on('imagenes')->onDelete('set null');
            $table->dropColumn('imagen'); // Eliminamos la columna antigua de imagen

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animales', function (Blueprint $table) {
            $table->string('imagen')->nullable();
            $table->dropForeign('imagen_id');
            $table->dropColumn('imagen_id');
        });
    }
};
