@extends('habock')

@section('titulo')
Nueva Relación
@endsection

@section('cuerpo')
<div class="container">
        <form action="{{ route('relacion.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label for="idestudiante" class="form-label">Estudiante</label>
                    <select name="idestudiante" id="idestudiante" class="form-control select2" required>
                        <option value="">-- Selecciona un estudiante --</option>
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="idcurso" class="form-label">Curso</label>
                    <select name="idcurso" id="idcurso" class="form-control" required>
                        <option value="">-- Selecciona un curso --</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->curso }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="iddocente" class="form-label">Docente</label>
                    <select name="iddocente" id="iddocente" class="form-control" required>
                        <option value="">-- Selecciona un docente --</option>
                        @foreach ($docentes as $docente)
                            <option value="{{ $docente->id }}">{{ $docente->docente }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" name="fecha" class="form-control"  require >
                </div>
                <div class="col-4">
                    <label for="calificacion" class="form-label">Calificacion</label>
                    <input type="text" name="calificacion" class="form-control"  require >
                </div>
                <div class="col-4">
                    <label for="idestudiantehabilitado" class="form-label">Habilitado</label>
                    <select name="habilitado" id="habilitado" class="form-control">
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="monto" class="form-label">Monto</label>
                    <input type="number" name="monto" class="form-control"  require >
                </div>
                <div class="col-4">
                    <label for="haber" class="form-label">Haber</label>
                    <input type="number" name="haber" class="form-control"  require >
                </div>
                <div class="col-4">
                    <label for="debe" class="form-label">Debe</label>
                    <input type="number" name="debe" class="form-control"  require >
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
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