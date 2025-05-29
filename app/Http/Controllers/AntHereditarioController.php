<?php

namespace App\Http\Controllers;

use App\Models\AntHereditario;
use App\Models\Paciente;
use Illuminate\Http\Request;

class AntHereditarioController extends Controller
{
    function index(Paciente $paciente) {
        return response()->json($paciente->anthereditarios()->get());
    }

    function store(Request $request, Paciente $paciente) {
        $validation = $request->validate([
            'relacion' => 'required|string|max:50|in:Padre,Madre,Abuela/a,Hermano/a,Familiar',
            'antecedente' => ['required', 'string', 'max:100', 'not_regex:/<[^>]*>/']
        ]);

        $paciente->anthereditarios()->create($validation);

        return response()->json(['El antecedente hereditario ha sido registrado.']);
    }

    function update(Request $request, Paciente $paciente, AntHereditario $antHereditario) {
        if ($antHereditario->paciente_id !== $paciente->id) {
            abort(403, 'Error intentando actualizar');
        }

        $validation = $request->validate([
            'relacion' => 'required|string|max:50|in:Padre,Madre,Abuela/a,Hermano/a,Familiar',
            'antecedente' => ['required', 'string', 'max:100', 'not_regex:/<[^>]*>/']
        ]);

        $antHereditario->update($validation);

        return response()->json(['Message' => 'Registro de antecedentes hereditarios actualizado.']);
    }

    function destroy(AntHereditario $antHereditario, Paciente $paciente) {
        if ($antHereditario->paciente_id !== $paciente->id) {
            abort(403, 'Error intentando actualizar');
        }

        $antHereditario->delete();

        return response()->json(['Antecedente eliminado.']);
    }
}
