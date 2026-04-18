<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(10);

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required|in:admin,user',
        ]);

       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;      
         $user->password = bcrypt($request->password);
         $user->user_type = $request->user_type;
            $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $usuario->id,
            'password' => 'nullable|string|min:6|confirmed',
            'user_type' => 'required|in:admin,user',
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function delete_confirm($id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios.delete_confirm', compact('usuario'));
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function profile()
    {
        $usuario = Auth::user();

        return view('usuarios.profile', compact('usuario'));
    }

    public function updateProfile(Request $request)
    {
        $usuario = Auth::user();

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $usuario->name = $data['nombre'];
        $usuario->save();

        return redirect()->route('usuarios.profile')->with('success', 'Perfil actualizado correctamente.');
    }

    public function updatePassword(Request $request)
    {
        $usuario = Auth::user();

        $data = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($data['current_password'], $usuario->password)) {
            return redirect()->route('usuarios.profile')->with('error', 'La contrasena actual no es correcta.');
        }

        $usuario->password = bcrypt($data['new_password']);
        $usuario->save();

        return redirect()->route('usuarios.profile')->with('success', 'Contrasena actualizada correctamente.');
    }
}
