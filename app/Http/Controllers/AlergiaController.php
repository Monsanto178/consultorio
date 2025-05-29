<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alergia;
use App\Models\Paciente;
use Illuminate\Support\Facades\Log;

class AlergiaController extends Controller
{
    function index(Paciente $paciente) {
        Log::info("Llegó al index");

        return response()->json($paciente->alergias()->get());
    }
    function store(Request $request, Paciente $paciente) {
        $validation= $request->validate([
            'alergia' => ['required', 'string', 'max:100', 'not_regex:/<[^>]*>/']
        ]);

        $paciente->alergias()->create($validation);

        return response()->json(['message' => 'Alergia registrada.']);
    }

    function update(Request $request, Paciente $paciente, Alergia $alergia) {
        Log::info("Llegó al update");

        if ($alergia->paciente_id !== $paciente->id) {
            abort(403, 'Error intentando actualizar');
        }

        $validation = $request->validate([
            'alergia' => ['required', 'string', 'max:100', 'not_regex:/<[^>]*>/']
        ]);

        $alergia->update($validation);

        return response()->json(['Registro de alergia actualizado.']);
    }

    function destroy(Alergia $alergia, Paciente $paciente) {
        if ($alergia->paciente_id !== $paciente->id) {
            abort(403, 'Ha ocurrido un error. Por favor vuelva a intentar.');
        }
        $alergia->delete();
        
        return response()->json(['message' => 'La alergia ha sido eliminada de los registros.']);
    }
}
