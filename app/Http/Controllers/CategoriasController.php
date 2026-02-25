<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index()
    {
        // Aquí puedes obtener las categorías de la base de datos y pasarlas a la vista
        $categorias = Categoria::all();
        
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $request->input('nombre');
        $categoria->save();

        // Redirigir a la lista de categorías con un mensaje de éxito
        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->input('nombre');
        $categoria->save();

        // Redirigir a la lista de categorías con un mensaje de éxito
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
