<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;
    protected $fillable = [
        'idcurso', 'iddocente', 'certificado', 'imagen', 'habilitado'
    ];

    // Relaciones con otras tablas
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'idcurso');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'iddocente');
    }
}
