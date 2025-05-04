<?php

namespace App\Http\Controllers;
use App\Models\Certificado;
use App\Models\Docente;
use App\Models\Curso;
use App\Models\Relacion;
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
        'idcurso' => 'required|exists:cursos,id',
        'iddocente' => 'required|exists:docentes,id',
        'imagen' => 'required|string|max:255',
        'font_size' => 'required|numeric',
        'font_angle' => 'required|numeric',
        'x' => 'required|numeric',
        'y' => 'required|numeric',
        'text_color' => 'required|string|max:7',
        'text_font' => 'required|string|max:255',
        'habilitado' => 'required|boolean',
    ]);

    Certificado::create([
        'idcurso' => $request->idcurso,
        'iddocente' => $request->iddocente,
        'imagen' => $request->imagen,
        'font_size' => $request->font_size,
        'font_angle' => $request->font_angle,
        'x' => $request->x,
        'y' => $request->y,
        'text_color' => $request->text_color,
        'text_font' => $request->text_font,
        'habilitado' => $request->habilitado,
    ]);

    return redirect()->route('certificados.index')->with('success', 'Certificado creado exitosamente.');
}

public function update(Request $request, $id)
{
    $certificado = Certificado::findOrFail($id);
    
    $request->validate([
        'idcurso' => 'required|exists:cursos,id',
        'iddocente' => 'required|exists:docentes,id',
        'imagen' => 'required|string|max:255',
        'font_size' => 'required|numeric',
        'font_angle' => 'required|numeric',
        'x' => 'required|numeric',
        'y' => 'required|numeric',
        'text_color' => 'required|string|max:7',
        'text_font' => 'required|string|max:255',
        'habilitado' => 'required|boolean',
    ]);

    $certificado->update([
        'idcurso' => $request->idcurso,
        'iddocente' => $request->iddocente,
        'imagen' => $request->imagen,
        'font_size' => $request->font_size,
        'font_angle' => $request->font_angle,
        'x' => $request->x,
        'y' => $request->y,
        'text_color' => $request->text_color,
        'text_font' => $request->text_font,
        'habilitado' => $request->habilitado,
    ]);

    return redirect()->route('certificados.index')->with('success', 'Certificado actualizado exitosamente.');
}

    // Mostrar el formulario para editar un certificado existente
    public function edit($id)
    {
        $certificado = Certificado::findOrFail($id); // Busca el certificado por ID o lanza un error 404
        $cursos = Curso::all(); // Obtiene todos los cursos disponibles
        $docentes = Docente::all(); // Obtiene todos los docentes disponibles
        return view('certificado.edit', compact('certificado', 'cursos', 'docentes')); // Retorna la vista 'edit' con los datos
    }

    // Eliminar un certificado de la base de datos
    public function destroy($id)
    {
        $certificado = Certificado::findOrFail($id); // Busca el certificado por ID o lanza un error 404
        $certificado->delete();
        return redirect()->route('certificados.index')->with('success', 'Certificado eliminado exitosamente.');
    }

    public function generar($id){
        $relaciones = Relacion::Where('idcertificado', $id)->get();

        foreach ($relaciones as $relacion) {
            $data = $relacion->id . '_' . $relacion->idestudiante . '_' . $relacion->id_curso . '_' . $relacion->created_at;
            $hash = hash('sha256', $data);
            \DB::table('relacions')
                ->where('id', $relacion->id)
                ->update(['link' => $hash]);
        }
        return redirect()->route('certificados.index')->with('success', 'Enlaces creados');
    }

}
