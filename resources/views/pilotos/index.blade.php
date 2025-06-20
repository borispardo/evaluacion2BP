@extends('layout.app')

@section('Contenido')
<br>
<div class = "container">
    <h1 class="text-center">Listado de Pilotos</h1>
    <div class="container mt-4">
        <div class="mx-auto" style="max-width: 1000px;">
            <div class="text-right">
                <a href="{{ route('predios.create') }}" class="btn btn-primary">
                    Agregar nuevo Piloto
                </a>
            </div>
            <br>
            <table class="table table-bordered table-striped table-hover mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Coordenada N°1</th>
                        <th>Coordenada N°2</th>
                        <th>Coordenada N°3</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pilotos as $pilotoTemporal)
                    <tr>
                        <td>{{ $pilotoTemporal->dni }}</td>
                        <td>{{ $pilotoTemporal->nombre }}</td>
                        <td>Latitud: {{ $pilotoTemporal->latitud1 }}<br>Longitud: {{ $pilotoTemporal->longitud1 }}</td>
                        <td>Latitud: {{ $pilotoTemporal->latitud2 }}<br>Longitud: {{ $pilotoTemporal->longitud2 }}</td>
                        <td>Latitud: {{ $pilotoTemporal->latitud3 }}<br>Longitud: {{ $pilotoTemporal->longitud3 }}</td>
                        <td class="text-center">
                            <a href="{{ route('pilotos.edit', $pilotoTemporal->id) }}" class="btn btn-sm btn-primary me-1">Editar</a>
                            <form action="{{ route('pilotos.destroy', $pilotoTemporal->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este piloto?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay pilotos registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

