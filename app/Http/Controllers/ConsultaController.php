<?php

namespace App\Http\Controllers;
use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    // Mostrar todas las consultas
    public function index()
    {
        $consultas = Consulta::all();
        return view('consulta.index', compact('consultas'));
    }

}
