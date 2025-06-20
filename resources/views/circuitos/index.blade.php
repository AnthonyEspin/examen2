@extends('layout.app')
@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Listado de Registros</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('tumodelo.create') }}" class="btn btn-primary mb-3">➕ Agregar nuevo registro</a>
        &nbsp;&nbsp;&nbsp;&nbsp; 
        <a href="{{ url('/tumodelo/mapa') }}" class="btn btn-success mb-3">Ver Mapa Global</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>País</th>
                        <th>Nombre</th>
                        <th>Latitud 1</th>
                        <th>Longitud 1</th>
                        <th>Latitud 2</th>
                        <th>Longitud 2</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->pais }}</td>
                            <td>{{ $registro->nombre }}</td>
                            <td>{{ $registro->latitud1 }}</td>
                            <td>{{ $registro->longitud1 }}</td>
                            <td>{{ $registro->latitud2 }}</td>
                            <td>{{ $registro->longitud2 }}</td>
                            <td>
                                <a href="{{ route('tumodelo.show', $registro->id) }}" class="btn btn-sm btn-info me-1">Ver</a>
                                <a href="{{ route('tumodelo.edit', $registro->id) }}" class="btn btn-sm btn-warning me-1">Editar</a>

                                <form action="{{ route('tumodelo.destroy', $registro->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este registro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($registros->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center">No hay registros disponibles.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection