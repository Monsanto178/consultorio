<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntPatologico extends Model
{
    use HasFactory;

    protected $table = 'antpatologicos';

    protected $fillable = [
        'antecedente'
    ];
    
    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }
}
