@extends('layout.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Editar Categoría</h1>
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $categoria->nombre) }}" class="w-full px-3 py-2 border rounded">
        </div> class="flex items-center justify-start"
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar Categoría</button>
        <a href="{{ route('categorias.index') }}" class="ml-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cancelar</a>
    </div>
    </form>
</div>
@endsection