@extends('layout.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
	<h1 class="text-2xl font-bold mb-4">Editar Usuario</h1>

	@if ($errors->any())
		<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
			<ul class="list-disc list-inside">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="mb-4">
			<label for="name" class="block text-gray-700 font-bold mb-2">Nombre:</label>
			<input type="text" name="name" id="name" value="{{ old('name', $usuario->name) }}" class="w-full px-3 py-2 border rounded" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
		</div>

		<div class="mb-4">
			<label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
			<input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}" class="w-full px-3 py-2 border rounded" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
		</div>

		<div class="mb-4">
			<label for="user_type" class="block text-gray-700 font-bold mb-2">Tipo de usuario:</label>
			<select name="user_type" id="user_type" class="w-full border rounded px-3 py-2" required>
				<option value="admin" {{ old('user_type', $usuario->user_type) == 'admin' ? 'selected' : '' }}>Administrador</option>
				<option value="user" {{ old('user_type', $usuario->user_type) == 'user' ? 'selected' : '' }}>Usuario</option>
			</select>
            @error('user_type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
		</div>

		<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar Usuario</button>
		<a href="{{ route('usuarios.index') }}" class="ml-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cancelar</a>
	</form>
</div>
@endsection
