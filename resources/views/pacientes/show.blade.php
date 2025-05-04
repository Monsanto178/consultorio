{{-- @extends('layouts.layout') --}}
@extends('layouts.app')
@php
    $titulo = "Paciente $paciente->apellido $paciente->nombre";
    $avatar = $paciente->genero === 'Masculino' ? 'images/avatars/kidboy.svg' : 'images/avatars/kidgirl.svg';
@endphp
@section('title', $titulo)
    
@section('content')
<style>
    .w-35 {
        width: 35%;
    }
    .btn {
        width: 100%
    }
</style>
<a href="{{route('pacientes.index')}}" class="text-dark">Volver</a>
<section class="w-75 mx-auto d-flex justify-content-between">
    <section class="w-35 border border-secundary border-3">
        <article class="d-flex align-items-center">
            <picture class="w-50 d-flex justify-content-center">
                <img src="{{asset($avatar)}}" class="w-75" alt="paciente_avatar">
            </picture>
            <div>
                <h4 class="mb-0">{{$paciente->nombre . ' ' . $paciente->apellido}}</h4>
                <p class="mb-0">{{$paciente->dni}}</p>
                <p class="mb-0">{{$paciente->genero}}</p>
                <p class="mb-0">{{$paciente->edad}}</p>
                <p class="mb-0">{{$paciente->estado === true ? 'Activo' : 'Inactivo'}}</p>
            </div>
        </article>
    </section>

    <section class="w-50">
        <article>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#tutores" aria-expanded="true" aria-controls="tutores">
                Tutores
            </button>
            <div id="tutores" class="show">
                <div class="card card-body">
                    @forelse ($paciente->tutores as $tutor)
                    <div class="d-flex align-items-center">
                        <picture class="w-50 d-flex justify-content-center">
                            <img src="{{asset('images/avatars/parent.svg')}}" class="w-75" alt="tutor_avatar">
                        </picture>
                        <div>
                            <h4 class="mb-0">{{$tutor->nombre . ' ' . $tutor->apellido}}</h4>
                            <p class="mb-0">DNI. {{$tutor->dni}}</p>
                            <p class="mb-0">Relacion. {{$tutor->relacion}}</p>
                            <p class="mb-0">Tel. {{isset($tutor->telefono) ? $tutor->telefono : '-'}}</p>
                            <p class="mb-0">Correo. {{isset($tutor->correo) ? $tutor->correo : '-'}}</p>
                        </div>
                    </div>
                    @empty
                        <div>
                            <h4>El paciente no posee tutores registrados.</h4>
                        </div>
                    @endforelse
                </div>
            </div>
        </article>
    </section>
</section>

   
@endsection