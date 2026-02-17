<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Página de inicio
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard (después de login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ===== RUTAS DE AUTENTICACIÓN =====

// LOGIN
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// REGISTRO
Route::post('/register', [AuthController::class, 'register'])->name('register');

// ===== RUTAS PROTEGIDAS (Requieren autenticación) =====
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});