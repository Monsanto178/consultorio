<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\AntPatologico;

class AntPatologicoController extends Controller
{
    function index(Paciente $paciente) {
        return response()->json($paciente->antpatologicos()->get());
    }

    function store(Request $request, Paciente $paciente) {
        $validation = $request->validate([
            'antecedente' => ['required', 'string', 'max:100', 'not_regex:/<[^>]*>/']
        ]);

        $paciente->anthereditarios()->create($validation);

        return response()->json(['El antecedente patologico ha sido registrado.']);
    }

    function update(Request $request, Paciente $paciente, AntPatologico $antPatologico) {
        if ($antPatologico->paciente_id !== $paciente->id) {
            abort(403, 'Error intentando actualizar');
        }

        $validation = $request->validate([
            'antecedente' => ['required', 'string', 'max:100', 'not_regex:/<[^>]*>/']
        ]);

        $antPatologico->update($validation);

        return response()->json(['Message' => 'Registro de antecedentes patologicos actualizado.']);
    }

    function destroy(AntPatologico $antPatologico, Paciente $paciente) {
        if ($antPatologico->paciente_id !== $paciente->id) {
            abort(403, 'Error intentando actualizar');
        }

        $antPatologico->delete();

        return response()->json(['Antecedente eliminado.']);
    }
}
