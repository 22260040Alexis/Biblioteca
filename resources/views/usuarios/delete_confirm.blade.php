@extends('layout.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold mb-4">Eliminar usuario</h1>
<p>¿Estás seguro de que deseas eliminar este usuario?</p>

<table class="min-w-full bg-white border">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Nombre</th>
            <th class="py-2 px-4 border-b">Email</th>
            <th class="py-2 px-4 border-b">Tipo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="py-2 px-4 border-b">{{ $usuario->id }}</td>
            <td class="py-2 px-4 border-b">{{ $usuario->name }}</td>
            <td class="py-2 px-4 border-b">{{ $usuario->email }}</td>
            <td class="py-2 px-4 border-b">{{ $usuario->user_type }}</td>
        </tr>
    </tbody>
</table>

<form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
    <a href="{{ route('usuarios.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>
</form>
</div>
@endsection