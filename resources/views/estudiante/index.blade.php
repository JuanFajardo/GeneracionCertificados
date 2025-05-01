@extends('habock')

@section('titulo')
Lista de Estudiantes
@endsection

@section('cuerpo')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="container">
        <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mb-3">Nuevo Estudiante</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Departamento</th>
                    <th>País</th>
                    <th>Profesión</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->id }}</td>
                        <td>{{ $estudiante->nombre }}</td>
                        <td>{{ $estudiante->paterno }} {{ $estudiante->materno }}</td>
                        <td>{{ $estudiante->celular }}</td>
                        <td>{{ $estudiante->correo }}</td>
                        <td>{{ $estudiante->departamento }}</td>
                        <td>{{ $estudiante->pais }}</td>
                        <td>{{ $estudiante->profesion }}</td>
                        <td>
                            <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection