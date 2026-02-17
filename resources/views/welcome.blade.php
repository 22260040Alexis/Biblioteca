<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&family=merriweather:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        * { font-family: 'Instrument Sans', sans-serif; }
        .merriweather { font-family: 'Merriweather', serif; }
        .hero-gradient { 
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        }
        .book-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .menu-open { 
            transform: translateX(0);
            transition: transform 0.3s ease-in-out;
        }
        .menu-closed { 
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }
        @media (min-width: 768px) {
            .menu-closed { 
                transform: translateX(0);
            }
        }
        .feature-card {
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <div class="bg-blue-600 p-2 rounded-md">
                        <i class="fas fa-book text-white text-xl"></i>
                    </div>
                    <a href="/" class="merriweather text-2xl font-bold text-blue-900">Biblio<span class="text-blue-600">Digital</span></a>
                </div>

                <!-- Menú Desktop -->
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-blue-900 font-semibold hover:text-blue-600 transition duration-300">Inicio</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 transition duration-300">Catálogo</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 transition duration-300">Servicios</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 transition duration-300">Eventos</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 transition duration-300">Contacto</a>
                </nav>

                <!-- Botones de Acción Desktop -->
                <div class="hidden md:flex space-x-4">
                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full font-medium transition duration-300">Iniciar Sesión</a>
                    <a href="#" class="bg-gray-100 hover:bg-gray-200 text-blue-900 px-6 py-2 rounded-full font-medium transition duration-300">Registrarse</a>
                </div>

                <!-- Botón Menú Hamburguesa -->
                <button id="menu-toggle" class="md:hidden text-blue-900 text-2xl focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Menú Móvil -->
        <div id="mobile-menu" class="menu-closed md:hidden absolute top-full left-0 w-full bg-white shadow-lg border-t border-gray-100">
            <div class="flex flex-col py-6 px-4 space-y-4">
                <a href="/" class="text-blue-900 font-semibold py-2 border-b border-gray-100">Inicio</a>
                <a href="#" class="text-gray-700 py-2 border-b border-gray-100">Catálogo</a>
                <a href="#" class="text-gray-700 py-2 border-b border-gray-100">Servicios</a>
                <a href="#" class="text-gray-700 py-2 border-b border-gray-100">Eventos</a>
                <a href="#" class="text-gray-700 py-2 border-b border-gray-100">Contacto</a>
                <div class="pt-4 space-y-4">
                    <a href="#" class="block bg-blue-600 hover:bg-blue-700 text-white text-center py-3 rounded-full font-medium transition duration-300">Iniciar Sesión</a>
                    <a href="#" class="block bg-gray-100 hover:bg-gray-200 text-blue-900 text-center py-3 rounded-full font-medium transition duration-300">Registrarse</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Sección Hero -->
    <section class="hero-gradient text-white">
        <div class="container mx-auto px-4 py-16 md:py-24">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0">
                    <h1 class="merriweather text-4xl md:text-5xl font-bold mb-6 leading-tight">Descubre un mundo de conocimiento en nuestra biblioteca</h1>
                    <p class="text-xl mb-8 opacity-90">Accede a miles de libros, recursos digitales y servicios exclusivos para toda la comunidad.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="#" class="bg-white text-blue-900 hover:bg-gray-100 font-bold py-3 px-8 rounded-full text-center transition duration-300">Explorar Catálogo</a>
                        <a href="#" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-900 font-bold py-3 px-8 rounded-full text-center transition duration-300">Registrarse Gratis</a>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                             alt="Biblioteca moderna" 
                             class="rounded-2xl shadow-2xl w-full h-auto">
                        <div class="absolute -bottom-4 -right-4 bg-yellow-500 text-blue-900 p-6 rounded-2xl shadow-xl max-w-xs">
                            <p class="font-bold text-lg">+50,000 libros disponibles</p>
                            <p class="text-sm mt-2">Físicos y digitales para todos los gustos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Características -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="merriweather text-3xl md:text-4xl font-bold text-center text-blue-900 mb-12">¿Por qué elegir nuestra biblioteca?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Característica 1 -->
                <div class="feature-card bg-gray-50 p-8 rounded-2xl text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-book-open text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">Amplia Colección</h3>
                    <p class="text-gray-600">Más de 50,000 títulos en diversas áreas del conocimiento, desde literatura clásica hasta las últimas publicaciones científicas.</p>
                </div>
                
                <!-- Característica 2 -->
                <div class="feature-card bg-gray-50 p-8 rounded-2xl text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-laptop-house text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">Recursos Digitales</h3>
                    <p class="text-gray-600">Accede a miles de libros electrónicos, audiolibros y revistas científicas desde cualquier dispositivo con conexión a internet.</p>
                </div>
                
                <!-- Característica 3 -->
                <div class="feature-card bg-gray-50 p-8 rounded-2xl text-center">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-users text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">Comunidad Activa</h3>
                    <p class="text-gray-600">Participa en clubes de lectura, talleres, charlas con autores y actividades culturales para todas las edades.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Libros Destacados -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="merriweather text-3xl md:text-4xl font-bold text-center text-blue-900 mb-12">Libros Destacados</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Libro 1 -->
                <div class="book-card bg-white rounded-xl overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                         alt="Libro 'El Arte de la Guerra'" 
                         class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-blue-900 mb-2">El Arte de la Guerra</h3>
                        <p class="text-gray-600 text-sm mb-4">Sun Tzu • Filosofía/Estategia</p>
                        <div class="flex justify-between items-center">
                            <span class="text-yellow-500">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </span>
                            <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Reservar →</a>
                        </div>
                    </div>
                </div>
                
                <!-- Libro 2 -->
                <div class="book-card bg-white rounded-xl overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                         alt="Libro 'Cien Años de Soledad'" 
                         class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-blue-900 mb-2">Cien Años de Soledad</h3>
                        <p class="text-gray-600 text-sm mb-4">Gabriel García Márquez • Literatura</p>
                        <div class="flex justify-between items-center">
                            <span class="text-yellow-500">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </span>
                            <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Reservar →</a>
                        </div>
                    </div>
                </div>
                
                <!-- Libro 3 -->
                <div class="book-card bg-white rounded-xl overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                         alt="Libro 'Sapiens'" 
                         class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-blue-900 mb-2">Sapiens: De Animales a Dioses</h3>
                        <p class="text-gray-600 text-sm mb-4">Yuval Noah Harari • Historia</p>
                        <div class="flex justify-between items-center">
                            <span class="text-yellow-500">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                            <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Reservar →</a>
                        </div>
                    </div>
                </div>
                
                <!-- Libro 4 -->
                <div class="book-card bg-white rounded-xl overflow-hidden shadow-md">
                    <img src="https://images.unsplash.com/photo-1506880018603-83d5b814b5a6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                         alt="Libro 'El Principito'" 
                         class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-blue-900 mb-2">El Principito</h3>
                        <p class="text-gray-600 text-sm mb-4">Antoine de Saint-Exupéry • Literatura Infantil</p>
                        <div class="flex justify-between items-center">
                            <span class="text-yellow-500">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </span>
                            <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Reservar →</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full transition duration-300">Ver Catálogo Completo</a>
            </div>
        </div>
    </section>

    <!-- Sección CTA -->
    <section class="py-16 bg-blue-900 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="merriweather text-3xl md:text-4xl font-bold mb-6">Únete a nuestra comunidad lectora</h2>
            <p class="text-xl mb-10 max-w-2xl mx-auto opacity-90">Regístrate gratuitamente y obtén acceso a préstamos de libros, recursos digitales y todos nuestros eventos culturales.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="#" class="bg-white text-blue-900 hover:bg-gray-100 font-bold py-3 px-8 rounded-full transition duration-300">Crear Cuenta Gratis</a>
                <a href="#" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-900 font-bold py-3 px-8 rounded-full transition duration-300">Más Información</a>
            </div>
            <p class="mt-8 text-sm opacity-75">Más de 25,000 miembros activos disfrutan de nuestros servicios</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-8 md:mb-0 md:w-1/3">
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="bg-blue-600 p-2 rounded-md">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <span class="merriweather text-2xl font-bold">Biblio<span class="text-blue-400">Digital</span></span>
                    </div>
                    <p class="text-gray-400 mb-6">Una biblioteca moderna al servicio de la comunidad, promoviendo la lectura y el acceso al conocimiento para todos.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-gray-800 hover:bg-blue-600 w-10 h-10 rounded-full flex items-center justify-center transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="bg-gray-800 hover:bg-blue-400 w-10 h-10 rounded-full flex items-center justify-center transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="bg-gray-800 hover:bg-pink-600 w-10 h-10 rounded-full flex items-center justify-center transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="bg-gray-800 hover:bg-red-600 w-10 h-10 rounded-full flex items-center justify-center transition duration-300">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 gap-8 md:w-2/3">
                    <div>
                        <h4 class="text-lg font-bold mb-4">Enlaces Rápidos</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Inicio</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Catálogo</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Servicios</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Horarios</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-bold mb-4">Recursos</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Biblioteca Digital</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Revistas Científicas</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Audiolibros</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Recursos para Niños</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-bold mb-4">Contacto</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mr-3 mt-1 text-blue-400"></i>
                                <span>Av. Principal 123, Ciudad Biblioteca</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-phone mr-3 text-blue-400"></i>
                                <span>+1 (555) 123-4567</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-envelope mr-3 text-blue-400"></i>
                                <span>info@bibliodigital.org</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-10 pt-8 text-center text-gray-500 text-sm">
                <p>&copy; 2023 BiblioDigital. Todos los derechos reservados. | Diseñado con <i class="fas fa-heart text-red-500"></i> para la comunidad lectora.</p>
                <p class="mt-2">Imágenes cortesía de <a href="https://unsplash.com" class="text-blue-400 hover:text-blue-300">Unsplash</a> (libres de derechos de autor para uso comercial).</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript para el menú hamburguesa -->
    <script>
        // Toggle del menú móvil
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('menu-open');
            mobileMenu.classList.toggle('menu-closed');
            
            // Cambiar ícono del botón
            const icon = menuToggle.querySelector('i');
            if (mobileMenu.classList.contains('menu-open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
        
        // Cerrar menú al hacer clic en un enlace (en móviles)
        const mobileLinks = document.querySelectorAll('#mobile-menu a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    mobileMenu.classList.remove('menu-open');
                    mobileMenu.classList.add('menu-closed');
                    const icon = menuToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
        });
        
        // Cerrar menú al hacer clic fuera (en móviles)
        document.addEventListener('click', (event) => {
            if (window.innerWidth < 768) {
                const isClickInsideMenu = mobileMenu.contains(event.target);
                const isClickOnToggle = menuToggle.contains(event.target);
                
                if (!isClickInsideMenu && !isClickOnToggle && mobileMenu.classList.contains('menu-open')) {
                    mobileMenu.classList.remove('menu-open');
                    mobileMenu.classList.add('menu-closed');
                    const icon = menuToggle.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            }
        });
    </script>
</body>