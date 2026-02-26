<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;   
use App\Models\Libro;

class HomeController extends Controller
{
    public function index()
    {
        $libros = Libro::paginate(2); // Obtener todos los libros y paginarlos
        return view('home.index', compact('libros'));
    }
}
