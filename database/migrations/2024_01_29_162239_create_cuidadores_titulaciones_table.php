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
        Schema::create('cuidadores_titulaciones', function (Blueprint $table) {
            $table->primary(["id_cuidador","id_titulacion1","id_titulacion2"]);

            $table->unsignedBigInteger('id_cuidador');
            $table->unsignedBigInteger('id_titulacion1');
            $table->unsignedBigInteger('id_titulacion2');
            $table->foreign("id_cuidador")->references("id")->on("cuidadores")->onDelete("cascade");
            $table->foreign("id_titulacion1")->references("id")->on("titulaciones")->onDelete("cascade");
            $table->foreign("id_titulacion2")->references("id")->on("titulaciones")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuidadores_titulaciones');
    }
};
