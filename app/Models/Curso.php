<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso', 'cargahoraria', 'descripcion', 'fechainicio', 'fechafin', 'monto', 'iddocente'
    ];

    // Relación con la tabla docentes
    public function docente()
    {
        return $this->belongsTo(Docente::class, 'iddocente');
    }
}
