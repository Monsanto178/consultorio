<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Paciente extends Model
{
    use HasFactory;
    
    protected $table = 'pacientes';
    protected $casts = ['fecha_nac' => 'date'];

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'genero',
        'fecha_nac',
        'estado'
    ];

    public function getEdadAttribute()
{
        $fecha_nacimiento = Carbon::parse($this->fecha_nac);
        $edad = $fecha_nacimiento->diff(Carbon::now());

        $anios = $edad->y === 1 ? "$edad->y año" : "$edad->y años";
        $meses = $edad->m === 1 ? "$edad->m mes" : "$edad->m meses";

        if ($edad->m === 0 && $edad->y === 0) {
            return 'Recien nacido';
        } else if($edad->y === 0) {
            return $meses;
        } else if($edad->m === 0){
            return $anios;
        }
        return "$anios y $meses";
}

    public function tutores() {
        return $this->belongsToMany(Tutor::class);
    }
}
