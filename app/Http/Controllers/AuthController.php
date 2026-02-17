<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar los datos de inicio de sesión
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        // Intentar iniciar sesión con las credenciales proporcionadas
        if (auth()->attempt($credentials)) {
            // Si las credenciales son correctas, redirige a la página de inicio  
            return redirect('/home');
        }
        
        // Si las credenciales son incorrectas, redirige de vuelta al formulario de login con errores
        return back()->withErrors([
            'email' => 'Las credenciales no son válidas',
        ]);
    }

    public function register(Request $request)
    {
        // Validar los datos del registro
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);
        
        // Crear el usuario (sin hashear, Laravel lo hace automáticamente)
        $user = \App\Models\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);
        
        // Iniciar sesión automáticamente y redirigir
        auth()->login($user);
        return redirect('/home');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
