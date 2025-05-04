@extends('habock')

@section('titulo')
Editar Docente
@endsection

@section('cuerpo')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
        <form action="{{ route('docentes.update', $docente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-3">
                    <label for="docente" class="form-label">Nombre del Docente</label>
                    <input type="text" name="docente" id="docente" class="form-control" value="{{ $docente->docente }}" required>
                </div>
                <div class="col-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" name="celular" id="celular" class="form-control" value="{{ $docente->celular }}" required>
                </div>
                <div class="col-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" value="{{ $docente->correo }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="cv" class="form-label">Curriculum Vitae</label>
                    <textarea name="cv" id="cv" class="form-control">{{ $docente->cv }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
            <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection