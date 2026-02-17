<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener los últimos libros (puedes cambiar a paginación)
        $books = Libro::orderBy('id', 'desc')->take(10)->get();
        return view('home.index', compact('books'));
    }
}
