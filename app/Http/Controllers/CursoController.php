<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\Docente;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with('docente')->get(); // Incluye datos del docente relacionado
        return view('curso.index', compact('cursos')); // Retorna la vista 'index' con los datos
    }

    // Mostrar el formulario para crear un nuevo curso
    public function create()
    {
        $docentes = Docente::all(); // Obtiene todos los docentes disponibles
        return view('curso.create', compact('docentes')); // Retorna la vista 'create' con los docentes
    }
 
    // Crear un nuevo curso
    public function store(Request $request)
    {
        $request->validate([
            'curso' => 'required|string|max:255',
            'cargahoraria' => 'required|integer',
            'descripcion' => 'nullable|string',
            'fechainicio' => 'required|date',
            'fechafin' => 'required|date',
            'monto' => 'required|numeric',
            'iddocente' => 'required|exists:docentes,id', // Asegura que el docente exista
        ]);

        Curso::create($request->all());
        return redirect()->route('cursos.index')->with('success', 'Curso creado exitosamente.');
    }

    // Mostrar el formulario para editar un curso existente
    public function edit($id)
    {
        $curso = Curso::findOrFail($id); // Busca el curso por ID o lanza un error 404
        $docentes = Docente::all(); // Obtiene todos los docentes disponibles
        return view('curso.edit', compact('curso', 'docentes')); // Retorna la vista 'edit' con los datos
    }

    // Actualizar un curso en la base de datos
    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id); // Busca el curso por ID o lanza un error 404
        $request->validate([
            'curso' => 'required|string|max:255',
            'cargahoraria' => 'required|integer',
            'descripcion' => 'nullable|string',
            'fechainicio' => 'required|date',
            'fechafin' => 'required|date',
            'monto' => 'required|numeric',
            'iddocente' => 'required|exists:docentes,id', // Asegura que el docente exista
        ]);

        $curso->update($request->all());
        return redirect()->route('cursos.index')->with('success', 'Curso actualizado exitosamente.');
    }
 
    // Eliminar un curso de la base de datos
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id); // Busca el curso por ID o lanza un error 404
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente.');
    }
}
