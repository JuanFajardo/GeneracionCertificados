@extends('habock')

@section('titulo')
Lista de Cursos
@endsection

@section('cuerpo')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="container">
        <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Nuevo Curso</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Carga Horaria</th>
                    <th>Fechas</th>
                    <th>Monto</th>
                    <th>Docente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $curso->curso }}</td>
                        <td>{{ $curso->cargahoraria }}</td>
                        <td>{{ $curso->fechainicio }} a {{ $curso->fechafin }}</td>
                        <td>{{ $curso->monto }}</td>
                        <td>{{ $curso->docente->docente ?? 'Sin asignar' }}</td>
                        <td>
                            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este curso?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection