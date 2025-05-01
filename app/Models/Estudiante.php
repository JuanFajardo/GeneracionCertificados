<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'paterno', 'materno', 'celular', 'ci', 'correo', 'departamento', 'pais', 'profesion'
    ];
}
