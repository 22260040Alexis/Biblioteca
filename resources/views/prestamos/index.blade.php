@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Lista de Prestamos</h1>

   <div class="mb-6">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('prestamos.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded">Crear Prestamo</a>
        </div>

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b"></th>
                    <th class="py-2 px-4 border-b"></th>
                    <th class="py-2 px-4 border-b"></th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $prestamo->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $prestamo->usuario->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $prestamo->libro->nombre }}</td>
                        <td class="py-2 px-4 border-b">{{ $prestamo->created_at->format('Y-m-d') }}</td>
                        <td class="py-2 px-4 border-b">
                            <!-- Aquí puedes agregar botones para editar o eliminar el préstamo -->
                        </td>
                    </tr>
                
                @endforeach
</tbody>
            </table>   
            </div>
</div>
@endsection