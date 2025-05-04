@extends('habock')

@section('titulo')
Nuevo Certificado
@endsection

@section('cuerpo')
<div class="container">
    <form action="{{ route('certificados.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-3">
                <label for="idcurso" class="form-label">Curso</label>
                <select name="idcurso" id="idcurso" class="form-control" required>
                    <option value="">-- Selecciona un curso --</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->curso }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <label for="iddocente" class="form-label">Docente</label>
                <select name="iddocente" id="iddocente" class="form-control" required>
                    <option value="">-- Selecciona un docente --</option>
                    @foreach ($docentes as $docente)
                        <option value="{{ $docente->id }}">{{ $docente->docente }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <label for="habilitado" class="form-label">Habilitado</label>
                <select name="habilitado" id="habilitado" class="form-control" required>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            
        </div>

        <div class="row">
            <div class="col-3">
                <label for="imagen" class="form-label">Imagen del Certificado</label>
                <input type="text" name="imagen" id="imagen" class="form-control" required>
            </div>
            <div class="col-3">
                <label for="font_size" class="form-label">Tamaño de Fuente</label>
                <input type="number" step="0.01" name="font_size" id="font_size" class="form-control" required>
            </div>
            <div class="col-3">
                <label for="font_angle" class="form-label">Ángulo de Fuente</label>
                <input type="number" step="0.01" name="font_angle" id="font_angle" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <label for="x" class="form-label">Posición X</label>
                <input type="number" step="0.01" name="x" id="x" class="form-control" required>
            </div>
            <div class="col-3">
                <label for="y" class="form-label">Posición Y</label>
                <input type="number" step="0.01" name="y" id="y" class="form-control" required>
            </div>
            <div class="col-3">
                <label for="text_color" class="form-label">Color de Texto (HEX)</label>
                <input type="text" name="text_color" id="text_color" class="form-control" placeholder="#FF5733" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <label for="text_font" class="form-label">Fuente del Texto</label>
                <input type="text" name="text_font" id="text_font" class="form-control" required>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('certificados.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection