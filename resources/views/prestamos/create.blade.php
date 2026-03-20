@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Crear prestamo</h1>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('prestamos.buscar_usuario') }}" method="POST">
            @csrf

            <label for="usuario_id" class="block text-gray-700 font-bold mb-2">ID Usuario:</label>
            <input type="text" name="usuario_id" id="usuario_id" value="{{ old('usuario_id') }}" class="w-full border rounded px-3 py-2 mb-4">

            <label for="usuario_nombre" class="block text-gray-700 font-bold mb-2">Nombre Usuario:</label>
            <input type="text" name="usuario_nombre" id="usuario_nombre" value="{{ old('usuario_nombre') }}" class="w-full border rounded px-3 py-2">

            <div class="flex items-center justify-between mt-4">
                <input type="submit" value="Buscar" class="bg-green-700 text-white px-4 py-2 rounded cursor-pointer">
                <a href="{{ route('prestamos.index') }}" class="ml-4 bg-gray-700 text-white px-4 py-2 rounded">Cancelar</a>
            </div>
        </form>

        @if(session('error'))
            <div class="mt-4 rounded bg-red-100 text-red-700 px-4 py-2">
                {{ session('error') }}
            </div>
        @endif

        @isset($usuario)
            <div class="mt-4">
                <h2 class="text-xl font-bold mb-2">Usuario encontrado:</h2>
                <p><strong>ID:</strong> {{ $usuario->id }}</p>
                <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
                <p><strong>Email:</strong> {{ $usuario->email }}</p>
            </div>
            
            <form action="{{ route('prestamos.select_libro') }}" method="POST">
                @csrf
                <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
                <input type="submit" value="Seleccionar Libro" class="mt-4 bg-blue-700 text-white px-4 py-2 rounded cursor-pointer">
            </form>
        @endisset
    </div>
</div>
@endsection