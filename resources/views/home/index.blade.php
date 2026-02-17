@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-7xl">
    <!-- Breadcrumb + Title -->
    <div class="mb-6 text-sm text-gray-600">
        <nav class="flex items-center gap-2">
            <a href="#" class="text-blue-600 hover:underline">Inicio</a>
            <span>/</span>
            <span class="text-gray-500">Libros</span>
        </nav>
    </div>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Gestión de Libros</h1>
            <p class="text-sm text-gray-600">Administra el catálogo de libros de la biblioteca</p>
        </div>
        <div>
            <a href="#" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Agregar libro
            </a>
        </div>
    </div>

    <!-- Stats cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-lg shadow-sm border">
            <div class="text-xs text-gray-500">Total de libros</div>
            <div class="mt-2 text-2xl font-bold">1,247</div>
            <div class="text-xs text-green-500 mt-1">▲ 5.2% desde el mes pasado</div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm border">
            <div class="text-xs text-gray-500">Libros prestados</div>
            <div class="mt-2 text-2xl font-bold">189</div>
            <div class="text-xs text-red-500 mt-1">▼ 2.1% desde el mes pasado</div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm border">
            <div class="text-xs text-gray-500">Usuarios activos</div>
            <div class="mt-2 text-2xl font-bold">543</div>
            <div class="text-xs text-green-500 mt-1">▲ 12.7% desde el mes pasado</div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm border">
            <div class="text-xs text-gray-500">Devoluciones pendientes</div>
            <div class="mt-2 text-2xl font-bold">24</div>
            <div class="text-xs text-red-500 mt-1">▲ 3.4% desde ayer</div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-sm border">
        <div class="p-4 border-b flex items-center justify-between">
            <h2 class="text-lg font-medium text-gray-900">Lista de Libros</h2>
            <div class="text-sm text-gray-500">Mostrando 1 a 3 de 1,247 resultados</div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ISBN</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Disponibilidad</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if(isset($books) && count($books) > 0)
                        @foreach($books as $book)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $book->titulo }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $book->autor }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $book->isbn ?? '—' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><span class="px-2 py-1 bg-blue-50 text-blue-700 rounded-full text-xs">{{ $book->categoria ?? 'General' }}</span></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @if(isset($book->disponible) && !$book->disponible)
                                    <span class="text-red-600 font-medium">Prestado</span>
                                @else
                                    <span class="text-green-600 font-medium">Disponible</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-blue-600 hover:underline mr-4">Editar</a>
                                <a href="#" class="text-red-600 hover:underline">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Cien años de soledad</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Gabriel García Márquez</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">978-0307474728</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm"><span class="px-2 py-1 bg-blue-50 text-blue-700 rounded-full text-xs">Literatura</span></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm"><span class="text-green-600 font-medium">Disponible</span></td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:underline mr-4">Editar</a>
                            <a href="#" class="text-red-600 hover:underline">Eliminar</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1984</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">George Orwell</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">978-0451524935</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm"><span class="px-2 py-1 bg-purple-50 text-purple-700 rounded-full text-xs">Ciencia Ficción</span></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm"><span class="text-red-600 font-medium">Prestado</span></td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:underline mr-4">Editar</a>
                            <a href="#" class="text-red-600 hover:underline">Eliminar</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Don Quijote de la Mancha</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Miguel de Cervantes</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">978-8420732855</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm"><span class="px-2 py-1 bg-blue-50 text-blue-700 rounded-full text-xs">Literatura</span></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm"><span class="text-green-600 font-medium">Disponible</span></td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:underline mr-4">Editar</a>
                            <a href="#" class="text-red-600 hover:underline">Eliminar</a>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t bg-white flex items-center justify-between">
            <div class="text-sm text-gray-600">Mostrando 1 a 3 de 1,247 resultados</div>
            <div class="flex items-center gap-2">
                <button class="px-3 py-1 border rounded-md text-gray-600">Anterior</button>
                <div class="flex items-center space-x-1">
                    <button class="px-3 py-1 bg-blue-600 text-white rounded-md">1</button>
                    <button class="px-3 py-1 border rounded-md">2</button>
                    <button class="px-3 py-1 border rounded-md">3</button>
                </div>
                <button class="px-3 py-1 border rounded-md text-gray-600">Siguiente</button>
            </div>
        </div>
    </div>

</div>

@endsection