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

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libro</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estatus</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha entrega</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $prestamo->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $prestamo->libro->nombre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $prestamo->usuario->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $prestamo->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                             @if($prestamo->estado === 'pendiente')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pendiente</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Entregado</span>
                                @endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">{{ $prestamo->fecha_entrega ? $prestamo->fecha_entrega : ''}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($prestamo ->estado == 'pendiente')
                            <a href="{{ route('prestamos.entregar', $prestamo->id) }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded">Entregar</a>
                            @endif
                        </td>
                    </tr>
                
                @endforeach
                </tbody>
            </table>   
         </div>
     </div>
</div>
@endsection