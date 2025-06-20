@extends('layout.app')

@section('Contenido')
<br>
<div class = "container">
    <h1 class="text-center">Listado de Predios</h1>
    <div class="container mt-4">
        <div class="mx-auto" style="max-width: 1000px;">
            <div class="text-right">
                <a href="{{ route('predios.create') }}" class="btn btn-primary">
                    Agregar nuevo Predio
                </a>
            </div>
            <br>
            <table class="table table-bordered table-striped table-hover mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Propietario</th>
                        <th>Clave Catastral</th>
                        <th>Coordenada N°1</th>
                        <th>Coordenada N°2</th>
                        <th>Coordenada N°3</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($predios as $predioTemporal)
                    <tr>
                        <td>{{ $predioTemporal->propietario }}</td>
                        <td>{{ $predioTemporal->clave }}</td>
                        <td>Latitud: {{ $predioTemporal->latitud1 }}<br>Longitud: {{ $predioTemporal->longitud1 }}</td>
                        <td>Latitud: {{ $predioTemporal->latitud2 }}<br>Longitud: {{ $predioTemporal->longitud2 }}</td>
                        <td>Latitud: {{ $predioTemporal->latitud3 }}<br>Longitud: {{ $predioTemporal->longitud3 }}</td>
                        <td class="text-center">
                            <a href="{{ route('predios.edit', $predioTemporal->id) }}" class="btn btn-sm btn-primary me-1">Editar</a>
                            <form action="{{ route('predios.destroy', $predioTemporal->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este predio?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay predios registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

