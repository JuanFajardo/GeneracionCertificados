@extends('habock')

@section('titulo')
Lista de Certificados
@endsection

@section('cuerpo')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
        <a href="{{ route('certificados.create') }}" class="btn btn-primary mb-3"> <i class="bi bi-plus-lg"></i> Nuevo </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Certificado</th>
                    <th>Curso</th>
                    <th>Docente</th>
                    <th>Habilitado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($certificados as $certificado)
                    <tr>
                        <td> <a href="{{asset('assets/certificado/'.$certificado->imagen)}}">{{ $certificado->imagen }}</a> </td>
                        <td>{{ $certificado->curso->curso ?? 'Sin asignar' }}</td>
                        <td>{{ $certificado->docente->docente ?? 'Sin asignar' }}</td>
                        <td>{{ $certificado->habilitado ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('certificados.edit', $certificado->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Editar </a>
                            <form action="{{ route('certificados.destroy', $certificado->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este certificado?')">
                                    <i class="bi bi-eraser-fill"></i> Eliminar</button>
                            </form>
                            <a href="{{ route('certificados.generar', $certificado->id) }}" class="btn btn-info btn-sm"> 
                                <i class="bi bi-file-image-fill"></i> Certificados</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection