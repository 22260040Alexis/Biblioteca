<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

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

        $credentials['email'] = strtolower(trim($credentials['email']));
        
        // Intentar iniciar sesión con las credenciales proporcionadas
        if (auth()->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
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

        $validatedData['email'] = strtolower(trim($validatedData['email']));
        
        // Crear el usuario (el cast 'hashed' del modelo aplica el hash automáticamente)
        $userData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'username' => $validatedData['email'], // Asignar el email como username
            'user_type' => 'user', // Asignar un tipo de usuario por defecto
        ];

        
        
        // Iniciar sesión automáticamente y redirigir
        $user = \App\Models\User::create($userData);
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
