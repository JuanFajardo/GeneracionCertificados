@extends('habock')

@section('titulo')
Nuevo Docente
@endsection

@section('cuerpo')
<div class="container">
        <form action="{{ route('docentes.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-3">
                    <label for="docente" class="form-label">Nombre del Docente</label>
                    <input type="text" name="docente" id="docente" class="form-control" required>
                </div>
                <div class="col-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" name="celular" id="celular" class="form-control" required>
                </div>
                <div class="col-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="cv" class="form-label">Curriculum Vitae</label>
                    <textarea name="cv" id="cv" class="form-control"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection