<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alergia extends Model
{
    use HasFactory;

    protected $table = 'alergias';

    protected $fillable = [
        'paciente_id',
        'alergia'
    ];
    public function paciente():BelongsTo 
    {
        return $this->belongsTo(Paciente::class);
    }
}
