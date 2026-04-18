<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Prestamo;

class LibrosController extends Controller
{
    public function index()
    {
        $libros = Libro::with('categoria')->orderBy('id', 'desc')->paginate(5);
        $total_libros = Libro::count();
        $libros_pestados = Libro::where('estatus', 1)->count();
        $total_usuarios = User::count();
        $devoluciones_pendientes = Prestamo::where('estado', 'pendiente')->count();

        return view('home.index', compact(
            'libros',
            'total_libros',
            'libros_pestados',
            'total_usuarios',
            'devoluciones_pendientes'
        ));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('libros.create', compact('categorias'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255', // Mantén el name del formulario como 'titulo'
        'autor' => 'required|string|max:255',
        'isbn' => 'nullable|string|max:100',
        'editorial' => 'nullable|string|max:255',
        'categoria' => 'required|exists:categorias,id',
    ]);

    $libro = new Libro();
    $libro->nombre = $request->nombre; // 👈 CAMBIA 'titulo' por 'nombre'
    $libro->autor = $request->autor;
    $libro->isbn = $request->isbn;
    $libro->editorial = $request->editorial;
    $libro->categoria_id = $request->categoria;
    $libro->estatus = 0; // Valor por defecto (disponible)
    $libro->save();

    return redirect()->route('home')->with('success', 'Libro agregado correctamente.');
}

   public function edit($id)
   {
       $libro = Libro::findOrFail($id);
       $categorias = Categoria::all();
       return view('libros.edit', compact('libro', 'categorias'));
   }
  
   public function update(Request $request, $id)
   {
       $request->validate([
           'nombre' => 'required|string|max:255',
           'autor' => 'required|string|max:255',
           'isbn' => 'nullable|string|max:100',
           'editorial' => 'nullable|string|max:255',
           'categoria' => 'required|exists:categorias,id',
       ]);

       $libro = Libro::findOrFail($id);
       $libro->nombre = $request->nombre;
       $libro->autor = $request->autor;
       $libro->isbn = $request->isbn;
       $libro->editorial = $request->editorial;
       $libro->categoria_id = $request->categoria;
       $libro->save();

       return redirect()->route('home')->with('success', 'Libro actualizado correctamente.');
   }
   Public function destroy($id)
   {
       $libro = Libro::findOrFail($id);
       $libro->delete();
       return redirect()->route('home')->with('success', 'Libro eliminado correctamente.');
   }
}