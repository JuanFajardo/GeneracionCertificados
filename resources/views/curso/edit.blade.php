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
        <h1 class="mb-4"></h1>
        <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4">
                    <label for="curso" class="form-label">Nombre del Curso</label>
                    <input type="text" name="curso" id="curso" class="form-control" value="{{ $curso->curso }}" required>
                </div>
                <div class="col-4">
                    <label for="cargahoraria" class="form-label">Carga Horaria</label>
                    <input type="number" name="cargahoraria" id="cargahoraria" class="form-control" value="{{ $curso->cargahoraria }}" required>
                </div>
                <div class="col-4">
                    <label for="iddocente" class="form-label">Docente</label>
                    <select name="iddocente" id="iddocente" class="form-control" required>
                        <option value="">-- Selecciona un docente --</option>
                        @foreach ($docentes as $docente)
                            <option value="{{ $docente->id }}" {{ $curso->iddocente == $docente->id ? 'selected' : '' }}>
                                {{ $docente->docente }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="fechainicio" class="form-label">Fecha de Inicio</label>
                    <input type="date" name="fechainicio" id="fechainicio" class="form-control" value="{{ $curso->fechainicio }}" required>
                </div>
                <div class="col-4">
                    <label for="fechafin" class="form-label">Fecha de Fin</label>
                    <input type="date" name="fechafin" id="fechafin" class="form-control" value="{{ $curso->fechafin }}" required>
                </div>
                <div class="col-4">
                    <label for="monto" class="form-label">Monto</label>
                    <input type="number" step="0.01" name="monto" id="monto" class="form-control" value="{{ $curso->monto }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control">{{ $curso->descripcion }}</textarea>
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
            <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection