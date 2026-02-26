<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    public function index()
    {
        // Aquí puedes obtener las categorías de la base de datos y pasarlas a la vista
        $categorias = Categoria::paginate(5); // Obtener todas las categorías y paginarlas
        
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

        $nextId = ((int) Categoria::max('id')) + 1;
        if ($nextId < 1) {
            $nextId = 1;
        }

        $driver = DB::getDriverName();
        if (in_array($driver, ['mysql', 'mariadb'])) {
            DB::statement("ALTER TABLE categorias AUTO_INCREMENT = {$nextId}");
        } elseif ($driver === 'sqlite') {
            $hasSqliteSequence = DB::selectOne("SELECT name FROM sqlite_master WHERE type = 'table' AND name = 'sqlite_sequence'");
            if ($hasSqliteSequence) {
                $seqValue = $nextId - 1;
                $existingSequence = DB::selectOne("SELECT seq FROM sqlite_sequence WHERE name = 'categorias'");

                if ($existingSequence) {
                    DB::update("UPDATE sqlite_sequence SET seq = ? WHERE name = 'categorias'", [$seqValue]);
                } else {
                    DB::insert("INSERT INTO sqlite_sequence (name, seq) VALUES ('categorias', ?)", [$seqValue]);
                }
            }
        }

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
