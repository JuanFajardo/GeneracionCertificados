@extends('habock')

@section('titulo')
Nuevo Estudiante
@endsection

@section('cuerpo')
    <div class="container">
        <form action="{{ route('estudiantes.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="col-4">
                    <label for="paterno" class="form-label">Apellido Paterno</label>
                    <input type="text" name="paterno" id="paterno" class="form-control" required>
                </div>
                <div class="col-4">
                    <label for="materno" class="form-label">Apellido Materno</label>
                    <input type="text" name="materno" id="materno" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" name="celular" id="celular" class="form-control" value="0" required>
                </div>
                <div class="col-4">
                    <label for="ci" class="form-label">CI</label>
                    <input type="text" name="ci" id="ci" class="form-control" value="0" required>
                </div>
                <div class="col-4">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="pais" class="form-label">País</label>
                    <input type="text" name="pais" id="pais" class="form-control"  list="lista-pais" required>
                    <datalist id="lista-pais">
                        <option value="Otro">Otro</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Chile">Chile</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Honduras">Honduras</option>
                        <option value="México">México</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Panamá">Panamá</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Perú">Perú</option>
                        <option value="República Dominicana">República Dominicana</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Venezuela">Venezuela</option>
                    </datalist>
                </div>
                <div class="col-4">
                    <label for="departamento" class="form-label">Departamento</label>
                    <input type="text" name="departamento" id="departamento" class="form-control"  list="lista-departamentos" required>
                    <datalist id="lista-departamentos">
                        <option value="Otro">Otro</option>
                        <option value="Potosí">Potosí</option>
                        <option value="La Paz">La Paz</option>
                        <option value="Cochabamba">Cochabamba</option>
                        <option value="Santa Cruz">Santa Cruz</option>
                        <option value="Oruro">Oruro</option>
                        <option value="Chuquisaca">Chuquisaca</option>
                        <option value="Tarija">Tarija</option>
                        <option value="Pando">Pando</option>
                        <option value="Beni">Beni</option>
                    </datalist>
                </div>
                <div class="col-4">
                    <label for="profesion" class="form-label">Profesión</label>
                    <input type="text" name="profesion" id="profesion" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection