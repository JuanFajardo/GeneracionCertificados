<?php

namespace App\Http\Controllers;

use App\Models\Relacion;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\Docente;
use Illuminate\Http\Request;

class RelacionController extends Controller
{
    // Mostrar todas las relaciones
    public function index()
    {
        $relaciones = Relacion::with(['estudiante', 'curso', 'docente', 'certificado'])->get();
        return view('relacion.index', compact('relaciones'));
    }

    // Mostrar el formulario para crear una nueva relación
    public function create()
    {
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        $docentes = Docente::all();
        return view('relacion.create', compact('estudiantes', 'cursos', 'docentes'));
    }

    // Guardar una nueva relación en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric',
            'haber' => 'nullable|numeric',
            'debe' => 'nullable|numeric',
        ]);
        Relacion::create($request->all());
        return redirect()->route('relacion.index')->with('success', 'Relación creada exitosamente.');
    }

    // Mostrar el formulario para editar una relación existente
    public function edit($id)
    {
        $relacion = Relacion::findOrFail($id);
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        $docentes = Docente::all();
        return view('relacion.edit', compact('relacion', 'estudiantes', 'cursos', 'docentes'));
    }

    // Actualizar una relación en la base de datos
    public function update(Request $request, $id)
    {
        $relacion = Relacion::findOrFail($id);

        $request->validate([
            'idestudiante' => 'required|exists:estudiantes,id',
            'idcurso' => 'required|exists:cursos,id',
            'iddocente' => 'required|exists:docentes,id',
            'idcertificado' => 'nullable|exists:certificados,id',
            'fecha' => 'required|date',
            'calificacion' => 'nullable|numeric|min:0|max:100',
            'monto' => 'required|numeric',
            'haber' => 'nullable|numeric',
            'debe' => 'nullable|numeric',
            'habilitado' => 'required|boolean',
        ]);

        $relacion->update($request->all());
        return redirect()->route('relacion.index')->with('success', 'Relación actualizada exitosamente.');
    }

    // Eliminar una relación de la base de datos
    public function destroy($id)
    {
        $relacion = Relacion::findOrFail($id);
        $relacion->delete();
        return redirect()->route('relacion.index')->with('success', 'Relación eliminada exitosamente.');
    }
}