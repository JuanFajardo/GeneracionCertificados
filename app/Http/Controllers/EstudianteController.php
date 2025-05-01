<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // Mostrar todos los estudiantes
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiante.index', compact('estudiantes'));
    }
 
    // Crear un nuevo estudiante
    public function create()
    {
        return view('estudiante.create');
    }

    // Crear un nuevo estudiante
    public function store(Request $request)
    {
        $estudiante = Estudiante::create($request->all());
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante Creado');
    }
 
    // Actualizar un estudiante
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);        
        return view('estudiante.edit', compact('estudiante'));
    }

    // Actualizar un estudiante
    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);
        if (!$estudiante) {
            return redirect()->route('estudiantes.index')->with('success', 'No se actulizo el estudiante');
        }
        $estudiante->update($request->all());
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado');
    }
 
     // Eliminar un estudiante
     public function destroy($id)
     {
         $estudiante = Estudiante::find($id);
         if (!$estudiante) {
             return redirect()->route('estudiantes.index')->with('success', 'Estudiante no encontrado');
         }
         $estudiante->delete();
         return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado');
     }
}
