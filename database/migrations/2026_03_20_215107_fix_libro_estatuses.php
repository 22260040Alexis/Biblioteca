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
        // Libros con préstamo activo → prestado (1)
        \DB::statement('UPDATE libros SET estatus = 1 WHERE id IN (SELECT libro_id FROM prestamos)');

        // Libros sin préstamo → disponible (0)
        \DB::statement('UPDATE libros SET estatus = 0 WHERE id NOT IN (SELECT libro_id FROM prestamos)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No hacer nada en el rollback de datos
    }
};
