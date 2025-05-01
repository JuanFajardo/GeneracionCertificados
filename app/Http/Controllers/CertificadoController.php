<?php

namespace App\Http\Controllers;
use App\Models\Certificado;
use App\Models\Docente;
use App\Models\Curso;
use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    // Mostrar todos los certificados
    public function index()
    {
        $certificados = Certificado::with(['curso', 'docente'])->get(); // Incluye datos relacionados
        return view('certificado.index', compact('certificados')); // Retorna la vista 'index' con los datos
    }
 
    // Mostrar el formulario para crear un nuevo certificado
    public function create()
    {
        $cursos = Curso::all(); // Obtiene todos los cursos disponibles
        $docentes = Docente::all(); // Obtiene todos los docentes disponibles
        return view('certificado.create', compact('cursos', 'docentes')); // Retorna la vista 'create' con los datos
    }

    // Guardar un nuevo certificado en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'certificado' => 'required|string|max:255',
            'idcurso' => 'required|exists:cursos,id', // Asegura que el curso exista
            'iddocente' => 'required|exists:docentes,id', // Asegura que el docente exista
            'habilitado' => 'required|boolean',
        ]);
        Certificado::create([
            'certificado' => $request->certificado,
            'imagen' => $request->imagen,
            'idcurso' => $request->idcurso,
            'iddocente' => $request->iddocente,
            'habilitado' => $request->habilitado,
        ]);

        return redirect()->route('certificados.index')->with('success', 'Certificado creado exitosamente.');
    }

    // Mostrar el formulario para editar un certificado existente
    public function edit($id)
    {
        $certificado = Certificado::findOrFail($id); // Busca el certificado por ID o lanza un error 404
        $cursos = Curso::all(); // Obtiene todos los cursos disponibles
        $docentes = Docente::all(); // Obtiene todos los docentes disponibles
        return view('certificado.edit', compact('certificado', 'cursos', 'docentes')); // Retorna la vista 'edit' con los datos
    }

    // Actualizar un certificado en la base de datos
    public function update(Request $request, $id)
    {
        $certificado = Certificado::findOrFail($id); // Busca el certificado por ID o lanza un error 404
        $request->validate([
            'certificado' => 'required|string|max:255',
            'idcurso' => 'required|exists:cursos,id', // Asegura que el curso exista
            'iddocente' => 'required|exists:docentes,id', // Asegura que el docente exista
            'habilitado' => 'required|boolean',
        ]);
        // Procesar la imagen si se proporciona una nueva
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes_certificados', 'public');
            $certificado->imagen = $imagenPath;
        }
        $certificado->update([
            'certificado' => $request->certificado,
            'idcurso' => $request->idcurso,
            'iddocente' => $request->iddocente,
            'habilitado' => $request->habilitado,
        ]);
        return redirect()->route('certificados.index')->with('success', 'Certificado actualizado exitosamente.');
    }

    // Eliminar un certificado de la base de datos
    public function destroy($id)
    {
        $certificado = Certificado::findOrFail($id); // Busca el certificado por ID o lanza un error 404
        $certificado->delete();
        return redirect()->route('certificados.index')->with('success', 'Certificado eliminado exitosamente.');
    }
}
