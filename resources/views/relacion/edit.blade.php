@extends('habock')

@section('titulo')
Editar Relacion
@endsection

@section('cuerpo')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
        <form action="{{ route('relacion.update', $relacion->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indica que se usará el método PUT para actualizar -->
            <div class="row">
                <div class="col-3">
                    <label for="idestudiante" class="form-label">Estudiante</label>
                    <select name="idestudiante" id="idestudiante" class="form-control select2" required>
                        <option value="">-- Selecciona un estudiante --</option>
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}" {{ $relacion->idestudiante == $estudiante->id ? 'selected' : '' }}>
                                {{ $estudiante->nombre." ".$estudiante->paterno." ".$estudiante->materno }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <label for="idcertificado" class="form-label">Certificado</label>
                    <select name="idcertificado" id="idcertificado" class="form-control" required>
                        <option value="">-- Selecciona un docente --</option>
                        @foreach ($certificados as $certificado)
                            <option value="{{ $certificado->id }}"{{ $relacion->idcertificado == $certificado->id ? 'selected' : '' }}>
                                {{ $certificado->imagen }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <label for="idcurso" class="form-label">Curso</label>
                    <select name="idcurso" id="idcurso" class="form-control" required>
                        <option value="">-- Selecciona un curso --</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}" {{ $relacion->idcurso == $curso->id ? 'selected' : '' }}>
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
                            <option value="{{ $docente->id }}" {{ $relacion->iddocente == $docente->id ? 'selected' : '' }}>
                                {{ $docente->docente }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" name="fecha" class="form-control" value="{{ $relacion->fecha }}" required>
                </div>
                <div class="col-4">
                    <label for="calificacion" class="form-label">Calificación</label>
                    <input type="text" name="calificacion" class="form-control" value="{{ $relacion->calificacion }}" required>
                </div>
                <div class="col-4">
                    <label for="habilitado" class="form-label">Habilitado</label>
                    <select name="habilitado" id="habilitado" class="form-control" required>
                        <option value="1" {{ $relacion->habilitado ? 'selected' : '' }}>SI</option>
                        <option value="0" {{ !$relacion->habilitado ? 'selected' : '' }}>NO</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="monto" class="form-label">Monto</label>
                    <input type="number" name="monto" class="form-control" value="{{ $relacion->monto }}" required>
                </div>
                <div class="col-4">
                    <label for="haber" class="form-label">Haber</label>
                    <input type="number" name="haber" class="form-control" value="{{ $relacion->haber }}" required>
                </div>
                <div class="col-4">
                    <label for="debe" class="form-label">Debe</label>
                    <input type="number" name="debe" class="form-control" value="{{ $relacion->debe }}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-warning">Actualizar</button>
            <a href="{{ route('relacion.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

@section('js')
<!-- Incluir Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: "Selecciona un estudiante",
                allowClear: true
            });
        });
    </script>
@endsection