@extends('layout.admin')

@section('content')
    <div>
        <h1 class="text-2xl font-bold mb-4">Usuarios</h1>

        <div class="mb-6">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('usuarios.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded">Agregar usuario</a>
        </div>

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nombre</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Tipo</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $usuario)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $usuario->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->user_type }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2 inline-block">Editar</a>
                            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 px-4 border-b text-center text-gray-600">No hay usuarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection