@extends('habock')

@section('titulo')
Lista de Consultas
@endsection

@section('cuerpo')
<div class="container">
        <table id="miTabla" class="table table-bordered">
            <thead>
                <tr>
                    <th>Certificado</th>
                    <th>Curso</th>
                    <th>Estudiante</th>
                    <th>Fecha</th>
                    <th>IP</th>
                    <th>Agent</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                    <tr>
                        <td>
                            <a href="{{ asset('index.php/'.$consulta->certificado) }}" target="_blank">Certificado</a>
                        </td>
                        <td>{{ $consulta->curso }}</td>
                        <td>{{ $consulta->estudiante }}</td>
                        <td>{{ $consulta->created_at }}</td>
                        <td>{{ $consulta->ip }}</td>
                        <td>{{ $consulta->agent }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#miTabla').DataTable();
    });
</script>
@endsection