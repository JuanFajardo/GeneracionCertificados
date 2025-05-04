@extends('habock')

@section('titulo')
Editar Certificado
@endsection

@section('cuerpo')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h1 class="mb-4">Editar Certificado</h1>
    <form action="{{ route('certificados.update', $certificado->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row">
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

        <div class="row mt-3">
            <div class="col-3">
                <label for="imagen" class="form-label">Imagen del Certificado</label>
                <input type="text" name="imagen" id="imagen" class="form-control" 
                       value="{{ old('imagen', $certificado->imagen) }}" required>
            </div>
            <div class="col-3">
                <label for="font_size" class="form-label">Tamaño de Fuente</label>
                <input type="number" step="0.01" name="font_size" id="font_size" class="form-control" 
                       value="{{ old('font_size', $certificado->font_size) }}" required>
            </div>
            <div class="col-3">
                <label for="font_angle" class="form-label">Ángulo de Fuente</label>
                <input type="number" step="0.01" name="font_angle" id="font_angle" class="form-control" 
                       value="{{ old('font_angle', $certificado->font_angle) }}" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-3">
                <label for="x" class="form-label">Posición X</label>
                <input type="number" step="0.01" name="x" id="x" class="form-control" 
                       value="{{ old('x', $certificado->x) }}" required>
            </div>
            <div class="col-3">
                <label for="y" class="form-label">Posición Y</label>
                <input type="number" step="0.01" name="y" id="y" class="form-control" 
                       value="{{ old('y', $certificado->y) }}" required>
            </div>
            <div class="col-3">
                <label for="text_color" class="form-label">Color de Texto (RGB)</label>
                <input type="text" name="text_color" id="text_color" class="form-control" 
                       placeholder="0,0,0" value="{{ old('text_color', $certificado->text_color) }}" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <label for="text_font" class="form-label">Fuente del Texto</label>
                <input type="text" name="text_font" id="text_font" class="form-control" 
                       value="{{ old('text_font', $certificado->text_font) }}" required>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-warning">Actualizar</button>
            <a href="{{ route('certificados.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

@if($certificado->imagen)
    <div class="mt-3">
        <label class="form-label">Vista Previa de la Imagen</label><br>
        <img 
            src="{{ asset('assets/certificado/'.$certificado->imagen) }}" 
            alt="Imagen del Certificado" 
            class="img-fluid rounded shadow-sm" 
            style="max-height: 200px;">
    </div>
@else
    <p>No hay imagen asociada.</p>
@endif
@endsection