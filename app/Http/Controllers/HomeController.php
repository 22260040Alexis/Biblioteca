<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\User;
use App\Models\Prestamo;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->user_type === 'admin') {
            $libros = Libro::with('categoria')->paginate(5);
            $total_libros = Libro::count();
            $libros_pestados = Libro::where('estatus', 1)->count();
            $total_usuarios = User::count();
            $devoluciones_pendientes = Prestamo::where('estado', 'pendiente')->count();

            return view('home.index', compact('libros', 'total_libros', 'libros_pestados', 'total_usuarios', 'devoluciones_pendientes'));
        } else {
            return view('home.index_user');
        }
    }
}