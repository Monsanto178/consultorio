<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntHereditario extends Model
{
    use HasFactory;

    protected $table = 'anthereditarios';
    
    protected $fillable = [
        'antecedente',
        'relacion'
    ];

    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }
}
