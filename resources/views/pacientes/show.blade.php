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
    .opt-btn {
        width: 100%
    }
</style>
<a href="{{route('pacientes.index')}}" class="text-dark">Volver</a>
<section class="w-75 mx-auto d-flex justify-content-between" id="mainContent">
    <section id="paciente_card" data-paciente-id="{{$paciente->id}}" class="w-35 border border-secundary border-3">
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
            <button class="btn btn-primary opt-btn" type="button" data-bs-toggle="collapse" data-bs-target="#tutores" aria-expanded="true" aria-controls="tutores">
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

        <article>
            <button data-tipo="ant-hereditarios" class="showBtn btn btn-primary opt-btn" type="button" data-bs-toggle="collapse" data-bs-target="#ant-hereditarios" aria-expanded="false" aria-controls="ant_family">
                Antecedentes Hereditarios
            </button>
            <div class="collapse" id="ant-hereditarios">
                <div class="card card-body">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </article>

        <article>
            <button data-tipo="ant-patologicos" class="showBtn btn btn-primary opt-btn" type="button" data-bs-toggle="collapse" data-bs-target="#ant-patologicos" aria-expanded="false" aria-controls="ant_patolog">
                Antecedentes Patológicos
            </button>
            <div class="collapse" id="ant-patologicos">
                <div class="card card-body">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </article>

        <article>
            <button data-tipo="alergias" id="alergias_show" class="showBtn btn btn-primary opt-btn" type="button" data-bs-toggle="collapse" data-bs-target="#alergias" aria-expanded="false" aria-controls="alergias">
                Alergias
            </button>
            <div class="collapse" id="alergias">
                <div class="card card-body">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </article>

        <article>
            <button class="btn btn-primary opt-btn" type="button" data-bs-toggle="collapse" data-bs-target="#consultas" aria-expanded="false" aria-controls="consultas">
                Consultas
            </button>
            <div class="collapse" id="consultas">
                <div class="card card-body">
                    <p>2024/10/15 -expansible- </p>
                    <p>Motivo</p>
                    <p>Descripción</p>
                    <a href="{{ route('pacientes.consulta.sintomas', $paciente) }}" style="background-color: black">SINTOMAS</a>
                    <a href="{{ route('pacientes.consulta.control', $paciente) }}" style="background-color: black">CONTROL</a>
                </div>
            </div>
        </article>

        <article>
            <button class="btn btn-primary opt-btn" type="button" data-bs-toggle="collapse" data-bs-target="#citas" aria-expanded="false" aria-controls="citas">
                Citas
            </button>
            <div class="collapse" id="citas">
                <div class="card card-body">
                    <p>2025/10/15</p>
                </div>
            </div>
        </article>
    </section>
</section>

<div class="modal" id="editModal" tabindex="-1" aria-labelledby="editLabel">
    <div class="modal-dialog">
        <form id="ediForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div id="editBody" class="modal-body">
                    <div class="mb-3">
                        <label for="editInput" class="form-label" id="editTitle"></label>
                        <input type="text" class="form-control" id="editInput" name="" required>
                    </div>
                    <div class="mb-3" id="extra-content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="submit-btn">Guardar cambios</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
     @vite('resources/js/getData.js')
@endsection