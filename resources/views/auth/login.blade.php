@extends('layout.auth')

@section('content')

 <!-- Header simple -->
    <header class="bg-white border-b border-gray-200 py-4">
        <div class="container mx-auto px-4">
            <a href="/" class="playfair text-2xl font-bold text-gray-900">Biblioteca<span class="text-blue-600">Municipal</span></a>
        </div>
    </header>

    <!-- Contenedor principal -->
    <div class="container mx-auto px-4 py-12 max-w-6xl">
        
        <!-- Título principal -->
        <div class="text-center mb-12">
            <h1 class="playfair text-3xl md:text-4xl font-bold text-gray-900 mb-4">Biblioteca Municipal</h1>
            <p class="text-lg text-gray-600">Accede a tu cuenta o regístrate para disfrutar de todos nuestros servicios</p>
        </div>

        <!-- Grid 2 columnas -->
        <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
            
            <!-- ========== COLUMNA IZQUIERDA: INICIAR SESIÓN ========== -->
            <div class="bg-white rounded-xl border border-gray-200 p-8">
                <h2 class="playfair text-2xl font-bold text-gray-900 mb-2">Iniciar Sesión</h2>
                <p class="text-gray-600 text-sm mb-6">Accede a tu cuenta de la biblioteca</p>
                
                <form class="space-y-5" action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Mostrar errores -->
                    @if ($errors->any())
                        <div class="p-3 bg-red-50 border border-red-200 rounded-lg">
                            @foreach ($errors->all() as $error)
                                <p class="text-sm text-red-600">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    
                    <!-- Correo electrónico -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               placeholder="usuario@ejemplo.com"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 text-gray-900 placeholder-gray-400 text-sm">
                    </div>
                    
                    <!-- Contraseña -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               placeholder="Introduce tu contraseña"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 text-gray-900 placeholder-gray-400 text-sm">
                    </div>
                    
                    <!-- Recordar sesión -->
                    <div class="flex items-center">
                        <input type="checkbox" 
                               id="remember" 
                               name="remember" 
                               class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="remember" class="ml-2 block text-sm text-gray-600">Recordar sesión</label>
                    </div>
                    
                    <!-- Botón Iniciar Sesión -->
                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 text-sm">
                        Iniciar Sesión
                    </button>
                    
                    <!-- Separador O -->
                    <div class="relative my-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-xs">
                            <span class="px-3 bg-white text-gray-500">O</span>
                        </div>
                    </div>
                    
                    <!-- Google -->
                    <button type="button" 
                            class="social-button w-full flex items-center justify-center px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200 text-sm">
                        <i class="fab fa-google mr-2 text-gray-600"></i>
                        <span class="text-gray-700 font-medium">Google</span>
                    </button>
                    
                    <!-- Link a registro -->
                    <p class="text-center text-sm text-gray-600 mt-4">
                        ¿No tienes una cuenta? 
                        <a href="#registro" class="text-blue-600 hover:text-blue-700 font-medium">Regístrate aquí</a>
                    </p>
                </form>
            </div>
            
            <!-- ========== COLUMNA DERECHA: CREAR CUENTA ========== -->
            <div id="registro" class="bg-white rounded-xl border border-gray-200 p-8">
                <h2 class="playfair text-2xl font-bold text-gray-900 mb-2">Crear Cuenta</h2>
                <p class="text-gray-600 text-sm mb-6">Regístrate para acceder a todos los servicios</p>
                
                <form class="space-y-5" action="{{ route('register') }}" method="POST">
                    @csrf
                    <!-- Nombre y Apellido - Grid 2 columnas -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   placeholder="Tu nombre"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 text-gray-900 placeholder-gray-400 text-sm">
                        </div>
                        
                    </div>
                    
                    <!-- Correo electrónico -->
                    <div>
                        <label for="email-registro" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                        <input type="email" 
                               id="email-registro" 
                               name="email" 
                               placeholder="usuario@ejemplo.com"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 text-gray-900 placeholder-gray-400 text-sm">
                        <p class="text-xs text-gray-500 mt-1">Usaremos este email para contactarte</p>
                    </div>
                    
                    <!-- Contraseña -->
                    <div>
                        <label for="password-registro" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <input type="password" 
                               id="password-registro" 
                               name="password" 
                               placeholder="Crea una contraseña"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 text-gray-900 placeholder-gray-400 text-sm">
                    </div>
                    
                    <!-- Repetir Contraseña -->
                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1">Repetir Contraseña</label>
                        <input type="password" 
                               id="password-confirm" 
                               name="password_confirmation" 
                               placeholder="Repite tu contraseña"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 text-gray-900 placeholder-gray-400 text-sm">
                        <p class="text-xs text-gray-500 mt-1">Mínimo 6 caracteres</p>
                    </div>
                    
                    <!-- Términos y condiciones -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" 
                                   id="terminos" 
                                   name="terminos" 
                                   class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                        <div class="ml-3 text-xs text-gray-600 leading-relaxed">
                            <label for="terminos">
                                Acepto los términos y condiciones y la política de privacidad de la Biblioteca Municipal. Confirmo que soy mayor de 14 años.
                            </label>
                        </div>
                    </div>
                    
                    <!-- Botón Crear Cuenta -->
                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 text-sm">
                        Crear Cuenta
                    </button>
                </form>
            </div>
        </div>

        <!-- ========== SECCIÓN INFERIOR: PRIMERA VEZ ========== -->
        <div class="mt-12 bg-blue-50 border border-blue-100 rounded-xl p-8">
            <div class="grid md:grid-cols-2 gap-6 items-center">
                <div>
                    <h3 class="playfair text-xl font-bold text-gray-900 mb-3">¿Primera vez en la biblioteca?</h3>
                    <p class="text-gray-700 text-sm md:text-base">
                        Si es tu primera visita, necesitarás registrarte para acceder a nuestros servicios de préstamo de libros, reservas y eventos.
                    </p>
                </div>
                <div class="text-center md:text-right">
                    <p class="text-gray-700 font-medium">
                        ¿Ya tienes una cuenta? 
                        <a href="#iniciar-sesion" class="text-blue-600 hover:text-blue-800 font-bold">Inicia sesión aquí</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @endsection