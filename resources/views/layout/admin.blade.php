<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed left-0 top-0 h-screen w-64 bg-gray-900 text-white shadow-lg overflow-y-auto z-40 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
        <div class="p-6 border-b border-gray-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-book text-lg"></i>
                </div>
                <div>
                    <h2 class="font-bold text-lg">Biblioteca Admin</h2>
                    <p class="text-xs text-gray-400">Sistema de gestión</p>
                </div>
            </div>
        </div>

        <nav class="p-4">
            <p class="text-xs font-semibold text-gray-400 uppercase mb-4">Menú Principal</p>
            
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 transition text-gray-300 hover:text-white">
                <i class="fas fa-home w-5"></i>
                <span>Inicio</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 transition text-gray-300 hover:text-white">
                <i class="fas fa-users w-5"></i>
                <span>Usuarios</span>
            </a>

             <a href="{{ route('categorias.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 transition text-gray-300 hover:text-white">
                <i class="fas fa-tags w-5"></i>
                <span>Categorías</span>
            </a>

            <a href="{{ route('libros.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 transition text-gray-300 hover:text-white">
                <i class="fas fa-book w-5"></i>
              <span>Libros</span>
            </a>

        

            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 transition text-gray-300 hover:text-white">
                <i class="fas fa-hand-holding-heart w-5"></i>
                <span>Préstamos</span>
            </a>

            <hr class="my-4 border-gray-700">

            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-red-700 transition text-red-400 hover:text-red-100">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Salir</span>
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Container -->
    <div class="lg:ml-64">
        <!-- Top Header -->
        <header class="bg-white border-b border-gray-200 sticky top-0 z-30">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center gap-4">
                    <button id="mobile-menu-button" class="lg:hidden text-gray-600 hover:text-gray-900">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                    <h1 class="text-xl font-semibold text-gray-800">Biblioteca Municipal</h1>
                </div>
                <div class="flex items-center gap-4">
                    <button class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-bell text-xl"></i>
                    </button>
                    <button class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-cog text-xl"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('partials.admin.footer')
    </div>

    <script>
        const btn = document.getElementById('mobile-menu-button');
        const sidebar = document.getElementById('sidebar');

        btn?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        // Cerrar sidebar al hacer clic fuera
        window.addEventListener('click', (e) => {
            if (!sidebar?.contains(e.target) && !btn?.contains(e.target) && window.innerWidth < 1024) {
                sidebar?.classList.add('-translate-x-full');
            }
        });
    </script>

</body>
</html>