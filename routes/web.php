<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TutorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('pacientes', PacienteController::class);

// Route::resource('pacientes.tutores', TutorController::class)->except(['index', 'show']);

Route::get('pacientes/{paciente}/tutores/create', [TutorController::class, 'create'])->name('pacientes.tutores.create');

Route::post('pacientes/{paciente}/tutores', [TutorController::class, 'store'])->name('pacientes.tutores.store');

Route::get('pacientes/{paciente}/tutores/{tutor}/edit', [TutorController::class, 'edit'])->name('pacientes.tutores.edit');

Route::put('pacientes/{paciente}/tutores/{tutor}', [TutorController::class, 'update'])->name('pacientes.tutores.update');

Route::delete('pacientes/{paciente}/tutores/{tutor}', [TutorController::class, 'delete'])->name('pacientes.tutores.delete');