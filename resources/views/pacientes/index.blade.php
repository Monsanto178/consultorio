{{-- @extends('layouts.layout') --}}
@extends('layouts.app')

@section('title', 'Consultorio Médico')
    
@section('content')
<style>
    .text-dark a {
      color: #212529 !important;
    }
</style>
<a href="{{route('pacientes.create')}}">Agregar</a>
<section class="container">
    <table id="pacientes-table" class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pacientes as $paciente)
            <tr>
                <td>{{$paciente->apellido}}</td>
                <td>{{$paciente->nombre}}</td>
                <td>{{$paciente->dni}}</td>
                <td>{{$paciente->estado === 1 ? 'Activo' : 'Inactivo'}}</td>
                <td class="text-dark">
                    <a href="{{route('pacientes.show', $paciente)}}">Ver</a>
                    <a href="{{route('pacientes.edit', $paciente)}}">Editar</a>
                    <a href="">Eliminar</a>
                </td>
            </tr>
            @empty
                <td colspan="5" class="text-center">No se han encontrado pacientes registrados</td>
            @endforelse
        </tbody>
    </table>
</section>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new DataTable('#pacientes-table');
    });
</script>
@endsection