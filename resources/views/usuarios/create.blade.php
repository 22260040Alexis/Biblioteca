@extends('layout.admin')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-4">Agregar Nuevo Usuario</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña:</label>
            <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2" required>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirmar contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded px-3 py-2" required>
            @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="user_type" class="block text-gray-700 font-bold mb-2">Nombre del usuario:</label>
            <select name="user_type" id="user_type" class="w-full border rounded px-3 py-2" required>
                <option value="">Seleccione un tipo de usuario</option>
                <option value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="user" {{ old('user_type') == 'user' ? 'selected' : '' }}>Usuario</option>
            </select>
            @error('user_type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar Usuario</button>
        <a href="{{ route('usuarios.index') }}" class="ml-4 bg-gray-600 text-white px-4 py-2 rounded">Cancelar</a>
    </form>
</div>
@endsection
