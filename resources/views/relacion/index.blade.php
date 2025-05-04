 @extends('habock')

@section('titulo')
Lista de Relaciones
@endsection

@section('cuerpo')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
        <a href="{{ route('relacion.create') }}" class="btn btn-primary mb-3"> <i class="bi bi-plus-lg"></i> Nuevo </a>
        <table id="miTabla" class="table table-bordered">
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Curso</th>
                    <th>Docente</th>
                    <th>Fecha</th>
                    <th>Calificación</th>
                    <th>Monto</th>
                    <th>Habilitado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($relaciones as $relacion)
                    <tr>
                        <td>
                            <a href="{{ asset('index.php/'.$relacion->link) }}">{{ $relacion->estudiante->nombre." ".$relacion->estudiante->paterno." ".$relacion->estudiante->materno  }}</a>
                        </td>
                        <td>{{ $relacion->curso->curso ?? 'Sin asignar' }}</td>
                        <td>{{ $relacion->docente->docente ?? 'Sin asignar' }}</td>
                        <td>{{ $relacion->fecha }}</td>
                        <td>{{ $relacion->calificacion ?? '-' }}</td>
                        <td>{{ $relacion->monto }}</td>
                        <td>{{ $relacion->habilitado ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('relacion.edit', $relacion->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Editar </a>
                            <form action="{{ route('relacion.destroy', $relacion->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">
                                    <i class="bi bi-eraser-fill"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#miTabla').DataTable();
    });
</script>
@endsection