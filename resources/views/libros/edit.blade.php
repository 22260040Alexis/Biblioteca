@extends('layout.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Editar Libro</h1>
    <form action="{{ route('libros.update', $libro->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $libro->nombre) }}" class="w-full px-3 py-2 border rounded">
       
         <div class="mb-4">
            <label for="autor" class="block text-gray-700 text-sm font-bold mb-2">Autor:</label>
            <input type="text" name="autor" id="autor" value="{{ old('autor') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="isbn" class="block text-gray-700 text-sm font-bold mb-2">ISBN:</label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="editorial" class="block text-gray-700 text-sm font-bold mb-2">Editorial:</label>
            <input type="text" name="editorial" id="editorial" value="{{ old('editorial') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="categoria" class="block text-gray-700 text-sm font-bold mb-2">Categoría (nombre):</label>
            <select name="categoria" id="categoria" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="">Seleccionar libro</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('libro') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>

                @endforeach
            </select>
        </div>
        <div class="flex items-center justify-start">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar Libro</button>
            <a href="{{ route('home') }}" class="ml-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cancelar</a>
        </div>
    </form>
</div>
@endsection