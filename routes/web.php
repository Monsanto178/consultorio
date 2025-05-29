<?php

use App\Http\Controllers\AlergiaController;
use App\Http\Controllers\AntHereditarioController;
use App\Http\Controllers\AntPatologicoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TutorController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('pacientes.create');
})->name('pacientes.create');

Route::resource('pacientes', PacienteController::class);

Route::get('pacientes/{paciente}/tutores/create', [TutorController::class, 'create'])->name('pacientes.tutores.create');

Route::post('pacientes/{paciente}/tutores', [TutorController::class, 'store'])->name('pacientes.tutores.store');

Route::get('pacientes/{paciente}/tutores/{tutor}/edit', [TutorController::class, 'edit'])->name('pacientes.tutores.edit');

Route::put('pacientes/{paciente}/tutores/{tutor}', [TutorController::class, 'update'])->name('pacientes.tutores.update');

Route::delete('pacientes/{paciente}/tutores/{tutor}', [TutorController::class, 'delete'])->name('pacientes.tutores.delete');

// Route::get('pacientes/{paciente}/create_consulta/control', [ConsultaController::class, 'createControl'])->name('consulta.control');

// Route::resource('pacientes.tutores', TutorController::class)->except(['index', 'show']);

// Route::get('pacientes/{paciente}/create_consulta/control', function() {
//     return view('consultas.create_control');
// })->name('consulta.control');

Route::prefix('pacientes/{paciente}')->name('pacientes.')->group(function () {
    Route::post('load-alergias', [AlergiaController::class, 'index'])->name('alergias.index');
    // Route::put('update-alergia/{alergia}', [AlergiaController::class, 'update'])->name('alergias.update');
    Route::resource('alergias', AlergiaController::class)->only(['store', 'update', 'destroy']);

    Route::post('load-ant-hereditarios', [AntHereditarioController::class, 'index'])->name('hereditarios.index');
    Route::resource('ant-hereditarios', AntHereditarioController::class)->only(['store', 'update', 'destroy']);

    Route::post('load-ant-patologicos', [AntPatologicoController::class, 'index'])->name('patologicos.index');
    Route::resource('ant-patologicos', AntPatologicoController::class)->only(['store', 'update', 'destroy']);


    Route::get('consulta/sintomas', [ConsultaController::class, 'createSintomas'])->name('consulta.sintomas');
    Route::get('consulta/control', [ConsultaController::class, 'createControl'])->name('consulta.control');
    // Log::info("Llegó a la update-alergia");
});