<?php

namespace App\Http\Controllers;
use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    // Mostrar todos los docentes
    public function index()
    {
        $docentes = Docente::all();
        return view('docente.index', compact('docentes'));
    }

    public function create()
    {
        return view('docente.create');
    }

    // Crear un nuevo docente
    public function store(Request $request)
    {
        $docente = Docente::create($request->all());
        return redirect()->route('docentes.index')->with('success', 'Docente Creado');
    }

    // Actualizar un docente
    public function edit($id)
    {
        $docente = Docente::find($id);        
        return view('docente.edit', compact('docente'));
    }

    // Actualizar un docente
    public function update(Request $request, $id)
    {
        $docente = Docente::find($id);
        if (!$docente) {
            return redirect()->route('docentes.index')->with('success', 'No se actulizo el docente');
        }
        $docente->update($request->all());
        return redirect()->route('docentes.index')->with('success', 'Docente Actualizado');
    }

    // Eliminar un docente
    public function destroy($id)
    {
        $docente = Docente::find($id);
        if (!$docente) {
            return redirect()->route('docentes.index')->with('success', 'Docente no encontrado');
        }
        $docente->delete();
        return redirect()->route('docentes.index')->with('success', 'Docente ELIMINADO');
    }
}
