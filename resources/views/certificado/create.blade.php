@extends('habock')

@section('titulo')
Nuevo Certificado
@endsection

@section('cuerpo')
    <div class="container">
        <form action="{{ route('certificados.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-3">
                    <label for="certificado" class="form-label">Nombre del Certificado</label>
                    <input type="text" name="certificado" id="certificado" class="form-control" required>
                </div>
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
                <div class="col-6">
                    <label for="imagen" class="form-label">Imagen del Certificado</label>
                    <textarea name="imagen" id="imagen" class="form-control" rows="10" required></textarea>
                </div>     
                <div class="col-6">
                    <div>

                    </div>
                </div>     
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('certificados.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection