@extends('habock')

@section('titulo')
Nuevo Curso
@endsection

@section('cuerpo')
<div class="container">
        <form action="{{ route('cursos.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label for="curso" class="form-label">Nombre del Curso</label>
                    <input type="text" name="curso" id="curso" class="form-control" required>
                </div>
                <div class="col-4">
                    <label for="cargahoraria" class="form-label">Carga Horaria</label>
                    <input type="number" name="cargahoraria" id="cargahoraria" class="form-control" required>
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
                    <label for="fechainicio" class="form-label">Fecha de Inicio</label>
                    <input type="date" name="fechainicio" id="fechainicio" class="form-control" required>
                </div>
                <div class="col-4">
                    <label for="fechafin" class="form-label">Fecha de Fin</label>
                    <input type="date" name="fechafin" id="fechafin" class="form-control" required>
                </div>
                <div class="col-4">
                    <label for="monto" class="form-label">Monto / Costo</label>
                    <input type="number" step="0.01" name="monto" id="monto" class="form-control" required>
                </div>
            </div>


            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection