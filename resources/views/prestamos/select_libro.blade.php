@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Seleccionar Libro</h1>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <h2 class="text-xl font-bold mb-2">Usuario</h2>
            <p><strong>ID:</strong> {{ $usuario->id }}</p>
            <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
            <p><strong>Email:</strong> {{ $usuario->email }}</p>
        </div>

        <form action="{{ route('prestamos.store') }}" method="POST">
            @csrf

            <label for="libro_id" class="block text-gray-700 font-bold mb-2">Libro:</label>
            <select name="libro_id" id="libro_id" class="w-full border rounded px-3 py-2 mb-4">
                <option value="">Seleccione un libro</option>
                @foreach($libros as $libro)
                    <option value="{{ $libro->id }}">
                        {{ $libro->nombre }} ({{ $libro->autor }}) -
                        @if((int) $libro->estatus === 1)
                            Prestado
                        @else
                            Disponible
                        @endif
                    </option>
                @endforeach
            </select>
            <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">

            <div class="flex items-center justify-between mt-4">
                <input type="submit" value="Prestar" class="bg-green-700 text-white px-4 py-2 rounded cursor-pointer">
                <a href="{{ route('prestamos.index') }}" class="ml-4 bg-gray-700 text-white px-4 py-2 rounded">Cancelar</a>
            </div>
        </form>

        @if(session('error'))
            <div class="mt-4 rounded bg-red-100 text-red-700 px-4 py-2">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>
@endsection