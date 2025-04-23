<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'telefono',
        'correo',
        // 'fecha_nac',
    ];

    public function pacientes() {
        return $this->belongsToMany(Paciente::class);
    }
}
