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
            $table->dropColumn('imagen');
            $table->unsignedBigInteger('id_imagen');
            $table->foreign("id_imagen")->references("id")->on("imagenes")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animales', function (Blueprint $table) {
            $table->dropColumn('id_imagen');
            $table->string('imagen');
        });
    }
};
