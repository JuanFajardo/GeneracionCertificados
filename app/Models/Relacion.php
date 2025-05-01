<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'idestudiante', 'idcurso', 'iddocente', 'idcertificado',
        'fecha', 'calificacion', 'monto', 'haber', 'debe', 'habilitado', 'link'
    ];

    // Relaciones con otras tablas
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'idestudiante');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'idcurso');
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'iddocente');
    }

    public function certificado()
    {
        return $this->belongsTo(Certificado::class, 'idcertificado');
    }
}
