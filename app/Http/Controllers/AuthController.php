<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UsuarioRegistrado;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        # Validar los datos de registro
        $validatedData = $request->validateWithBag('register', [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        # Crear el usuario
        $user = \App\Models\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'username' => $validatedData['email'], // Asignar el email como username
            'user_type' => 'user', // Asignar un tipo de usuario por defecto
        ]);

        # Redirigir o iniciar sesión automáticamente
        auth()->login($user);
        $request->session()->regenerate();

        Mail::to($user->email)->queue(new UsuarioRegistrado($user));

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        # Validar los datos de inicio de sesión
        $credentials = $request->validateWithBag('login', [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        # Intentar iniciar sesión
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no son correctas.',
        ], 'login')->withInput();
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}