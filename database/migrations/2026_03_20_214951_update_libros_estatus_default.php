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
        // Cambiar el default de la columna estatus a 0 (Disponible)
        Schema::table('libros', function (Blueprint $table) {
            $table->smallInteger('estatus')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->smallInteger('estatus')->default(1)->change();
        });
    }
};
