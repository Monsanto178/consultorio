@extends('layouts.layout')

@section('title', 'Consultorio Médico')
    
@section('content')
    <div class="welcome_cheer">
        <h2>¡Bienvenido!</h2>
        <h3>¿Qué desea consultar el día de hoy?</h3>
    </div>

    <section class="home_options">
        <x-home-opt 
        btn-url="/pacientes" 
        btn-title="PACIENTES" 
        btn-class="pacientes" 
        portrait-src="{{ asset('images/pacientes.png') }}" 
        />
        <x-home-opt 
        btn-url="/consultas" 
        btn-title="CONSULTAS" 
        btn-class="consultas" 
        portrait-src="{{ asset('images/consultas.svg') }}" 
        />
        <x-home-opt 
        btn-url="/prescripciones" 
        btn-title="PRESCRIPCIONES" 
        btn-class="prescripciones" 
        portrait-src="{{ asset('images/prescripciones.png') }}"  
        />
    </section>
@endsection