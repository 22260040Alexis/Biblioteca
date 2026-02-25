<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{


protected $table_name = 'libros';
    // 👇 ESTA ES LA RELACIÓN QUE DEBE EXISTIR
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}