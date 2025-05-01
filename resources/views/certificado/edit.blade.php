@extends('habock')

@section('titulo')
Editar Curso
@endsection

@section('cuerpo')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
        <h1 class="mb-4">Editar Certificado</h1>
        <form action="{{ route('certificados.update', $certificado->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-3">
                    <label for="certificado" class="form-label">Nombre del Certificado</label>
                    <input type="text" name="certificado" id="certificado" class="form-control" value="{{ $certificado->certificado }}" required>
                </div>
                <div class="col-3">
                    <label for="idcurso" class="form-label">Curso</label>
                    <select name="idcurso" id="idcurso" class="form-control" required>
                        <option value="">-- Selecciona un curso --</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}" {{ $certificado->idcurso == $curso->id ? 'selected' : '' }}>
                                {{ $curso->curso }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <label for="iddocente" class="form-label">Docente</label>
                    <select name="iddocente" id="iddocente" class="form-control" required>
                        <option value="">-- Selecciona un docente --</option>
                        @foreach ($docentes as $docente)
                            <option value="{{ $docente->id }}" {{ $certificado->iddocente == $docente->id ? 'selected' : '' }}>
                                {{ $docente->docente }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <label for="habilitado" class="form-label">Habilitado</label>
                    <select name="habilitado" id="habilitado" class="form-control" required>
                        <option value="1" {{ $certificado->habilitado ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ !$certificado->habilitado ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="imagen" class="form-label">Imagen del Certificado</label>
                    <textarea name="imagen" id="imagen" class="form-control" rows="10" required>
                        {{ $certificado->imagen }}
                    </textarea>
                </div>
                <div class="col-6">
                    {!! $certificado->imagen !!}
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('certificados.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection