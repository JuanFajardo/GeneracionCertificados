@extends('habock')

@section('titulo')
Editar Estudiante
@endsection

@section('cuerpo')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="container">
        <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $estudiante->nombre }}" required>
                </div>
                <div class="col-4">
                    <label for="paterno" class="form-label">Apellido Paterno</label>
                    <input type="text" name="paterno" id="paterno" class="form-control" value="{{ $estudiante->paterno }}">
                </div>
                <div class="col-4">
                    <label for="materno" class="form-label">Apellido Materno</label>
                    <input type="text" name="materno" id="materno" class="form-control" value="{{ $estudiante->materno }}">
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" name="celular" id="celular" class="form-control" value="{{ $estudiante->celular }}">
                </div>
                <div class="col-4">
                    <label for="ci" class="form-label">CI</label>
                    <input type="text" name="ci" id="ci" class="form-control" value="{{ $estudiante->ci }}">
                </div>
                <div class="col-4">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" value="{{ $estudiante->correo }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <label for="departamento" class="form-label">Departamento</label>
                    <input type="text" name="departamento" id="departamento" class="form-control" value="{{ $estudiante->departamento }}">
                </div>
                <div class="col-4">
                    <label for="pais" class="form-label">País</label>
                    <input type="text" name="pais" id="pais" class="form-control" value="{{ $estudiante->pais }}">
                </div>
                <div class="col-4">
                    <label for="profesion" class="form-label">Profesión</label>
                    <input type="text" name="profesion" id="profesion" class="form-control" value="{{ $estudiante->profesion }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection