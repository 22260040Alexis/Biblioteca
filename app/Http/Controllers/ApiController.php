<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Http\Resources\LibroResource;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        # Validar los datos de inicio de sesión
        $credentials = request()->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);        

        
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('api-token')->plainTextToken;

            return ['token' => $token];
        }

        return ['error' => 'Datos incorrectos.'];
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return ['data' => 'Sessión cerrada.'];
    }

    public function libros_disponibles()
    {
        $libros = Libro::where('estatus',0)->orderBy('id','asc')->get();
        $libros_resource = LibroResource::collection($libros);
        return $libros_resource;
    }

    public function entregar_libro(Request $request)
    {
        $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
        ]);

        $id = $request->input('prestamo_id');
    
        \DB::beginTransaction();
        try{
            $prestamo = Prestamo::findOrFail($id);
            $prestamo->estado = 'entregado';
            $prestamo->fecha_entrega = now();
            $prestamo->save();

            $libro = Libro::findOrFail($prestamo->libro_id);
            $libro->estatus = 0;
            $libro->save();

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            return  ['error' => 'Error al registrar el préstamo.'];
        }

        return ['data' => 'Libro entregado exitosamente.'];
    }
}