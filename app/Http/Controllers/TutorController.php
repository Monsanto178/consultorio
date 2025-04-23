<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTutorRequest;
use App\Http\Requests\UpdateTutorRequest;
use App\Models\Paciente;
use App\Models\Tutor;

class TutorController extends Controller
{
    function create() {
        return view('crear_tutor');
    }

    function store(StoreTutorRequest $request, Paciente $paciente) {
        
        $tutor = Tutor::create($request->validated());
        $paciente->tutores()->attach($tutor->id);

        return redirect()->route('pacientes');
    }

    function edit(Tutor $tutor) {
        return view('editar_tutor', compact('tutor'));
    }

    function update(UpdateTutorRequest $request,Tutor $tutor) {
       
        $tutor->update($request->validated());

        return redirect()->back()->with('sucess', 'El tutor ha sido editado con éxito.');
    }
}
