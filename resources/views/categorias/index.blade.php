@extends ('layout.admin')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-4">Categorías</h1>
    <div class="mb-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('categorias.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded">Agregar categoría</a>
    
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($categorias as $categoria)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $categoria->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $categoria->nombre }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2 inline-block">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $categorias->links() }}
        </div>
    </div>
@endsection