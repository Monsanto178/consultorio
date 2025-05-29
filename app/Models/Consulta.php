<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'altura',
        'peso',
        'circunferencia',
        'anomalias',
        'sintomas',
        'descripcion',
        'observaciones'
    ];
    
    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }
}
