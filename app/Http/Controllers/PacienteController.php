<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Models\Paciente;
use App\Models\Tutor;

class PacienteController extends Controller
{
    function create() {
        return view('pacientes.create');
    }

    function store(StorePacienteRequest $request) {
        $tutorData = $request->input('tutor');
        $pacienteData = $request->input('paciente');

        $paciente = Paciente::create($pacienteData);
        $tutor = Tutor::create($tutorData);

        $paciente->tutores()->attach($tutor->id);

        // dd($paciente);

        return redirect()->route('home');
    }

    function index() {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    function show(Paciente $paciente) {
        $paciente->load('tutores');

        return view('pacientes.show', compact('paciente'));
    }

    function edit(Paciente $paciente) {
        return view('pacientes.edit', compact('paciente'));
    }

    function update(UpdatePacienteRequest $request, Paciente $paciente) {

        $paciente->update($request->validated());
        
        return redirect()->route('pacientes')->with('succes', '¡Paciente actualizado exitosamente!');
    }

    function destroy(Paciente $paciente) {
        $paciente->delete();
        return redirect()->route('pacientes')->with('succes', '¡Paciente eliminado exitosamente!');
    }
}
