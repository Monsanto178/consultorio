<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class ConsultaController extends Controller
{
    function createControl(Paciente $paciente) {
        return view('consultas.create_control', compact('paciente'));
    }
    function createSintomas(Paciente $paciente) {
        return view('consultas.create_sintomas', compact('paciente'));
    }
}
