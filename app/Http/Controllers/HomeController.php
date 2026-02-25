<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;   
use App\Models\Libro;

class HomeController extends Controller
{
    public function index()
    {
        $libros = Libro::with('categoria')->orderBy('id', 'desc')->get();
        return view('home.index', compact('libros'));
    }
}
