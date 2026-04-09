<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/debug/libros', function () {
    $libros = DB::table('libros')->select('id', 'nombre', 'estatus')->get();
    $prestamos = DB::table('prestamos')->select('id', 'usuario_id', 'libro_id')->get();
    
    return [
        'libros' => $libros,
        'prestamos' => $prestamos
    ];
});
