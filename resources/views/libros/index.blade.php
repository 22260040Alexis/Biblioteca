@extends ('layout.admin')

@section('content')
<div>
    <h1 class="text-2xl font-bold mb-4">Libros</h1>
    <div class="mb-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('libros.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded">Agregar libro</a>
    </div>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nombre</th>
                <th class="py-2 px-4 border-b">Autor</th>
                <th class="py-2 px-4 border-b">Categoría</th>
                <th class="py-2 px-4 border-b">ISBN</th>
                <th class="py-2 px-4 border-b">Editorial</th>
                <th class="py-2 px-4 border-b">Estatus</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
            <tr>
                <td class="py-2 px-4 border-b">{{ $book->id }}</td>
                <td class="py-2 px-4 border-b">{{ $book->nombre }}</td>
                <td class="py-2 px-4 border-b">{{ $book->autor }}</td>
                <td class="py-2 px-4 border-b">{{ $book->categoria ? $book->categoria->nombre : '-' }}</td>
                <td class="py-2 px-4 border-b">{{ $book->isbn ?? '-' }}</td>
                <td class="py-2 px-4 border-b">{{ $book->editorial ?? '-' }}</td>
                <td class="py-2 px-4 border-b">{{ $book->estatus ? 'Activo' : 'Inactivo' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="py-4 px-4 text-center">No hay libros registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
