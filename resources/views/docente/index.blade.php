@extends('habock')

@section('titulo')
Lista de Docentes
@endsection

@section('cuerpo')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
        <a href="{{ route('docentes.create') }}" class="btn btn-primary mb-3"> <i class="bi bi-plus-lg"></i> Nuevo </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Docente</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($docentes as $docente)
                    <tr>
                        <td>{{ $docente->id }}</td>
                        <td>{{ $docente->docente }}</td>
                        <td>{{ $docente->celular }}</td>
                        <td>{{ $docente->correo }}</td>
                        <td>
                            <a href="{{ route('docentes.edit', $docente->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Editar </a>
                            <form action="{{ route('docentes.destroy', $docente->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este docente?')">
                                    <i class="bi bi-eraser-fill"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection