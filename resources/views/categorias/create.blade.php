@extends ('layout.admin')

@section('content')

<div>
    <h1 class="text-2xl font-bold mb-4">Agregar Nueva Categoría</h1>
    <form action="{{ route('categorias.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="w-full border rounded px-3 py-2" rows="4"></textarea>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar Categoría</button>
        <a href="{{ route('categorias.index') }}" class="ml-4 bg-gray-600 text-white px-4 py-2 rounded">Cancelar</a>
    </form>

@endsection