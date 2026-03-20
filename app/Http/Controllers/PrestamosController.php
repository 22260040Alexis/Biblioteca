<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Libro;
use App\Models\Prestamo;    

class PrestamosController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with('usuario', 'libro')->get();

        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        return view('prestamos.create');
    }

    public function buscar_usuario(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $usuario_nombre = $request->input('usuario_nombre');

        if(!empty($usuario_id))
            {
                $usuario = User::findOrFail($usuario_id);

                return view('prestamos.create', compact('usuario'));
            }

            if(!empty($usuario_nombre))
            {
                $usuario = User::where('name', 'LIKE', '%' . $usuario_nombre . '%')->first();

                if ($usuario) {
                    return view('prestamos.create', compact('usuario'));
                }
            }
    }

    public function select_libro(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        if (empty($usuario_id)) {
            return redirect()->route('prestamos.create')->with('error', 'Debe seleccionar un usuario primero.');
        }

        $usuario = User::findOrFail($usuario_id);
        $libros = Libro::all();

        return view('prestamos.select_libro', compact('usuario', 'libros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'libro_id' => 'required|exists:libros,id',
        ]);

        #crear trasaccion
        \DB::beginTransaction();

        try {
            $prestamo = new Prestamo();
            $prestamo->usuario_id = $request->input('usuario_id');
            $prestamo->libro_id = $request->input('libro_id');
            $prestamo->save();

            $libro = Libro::findOrFail($request->input('libro_id'));
            $libro->estatus = 1; // Marcar como prestado
            $libro->save();
            
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->route('prestamos.index')->with('error', 'Error al registrar el préstamo.');
        }

        

        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado exitosamente.');
    }
}
