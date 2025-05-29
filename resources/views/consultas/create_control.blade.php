{{-- @extends('layouts.layout') --}}
@extends('layouts.app')
@php
    $edad = 2;
@endphp

@section('content')
    <style>
      @media(min-width: 750px) {
        .custom_width {
          width: 50% !important;
          margin-left: auto;
          margin-right: auto;
        }
      }
    </style>

    <a href="{{route('pacientes.show', $paciente)}}">Volver</a>
    <form class="custom_width w-100 my-4 mx-auto row g-5 border p-3" action="{{ route('pacientes.store')}}" method="POST">
      @csrf
      {{-- Datos del Paciente --}}
      <article class="col-12 my-5">
        <div class="row gy-2">
          <div class="col-12">
            <h2>Nuevo chequeo</h2>
          </div>
          <div class="col-md-6">
            <label for="inputName" class="form-label">Altura</label>
            <input type="number" 
              id="inputName" 
              name="paciente[nombre]"
              value="{{old('paciente.nombre')}}"
              min="40"
              max="200"
              class="form-control @error('paciente.nombre') is-invalid @enderror">
            @error('paciente.nombre')
                <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="inputSurname" class="form-label">Peso</label>
            <input type="number"  
              id="inputSurname" 
              name="paciente[apellido]"
              value="{{old('paciente.apellido')}}"
              step="0.1"
              min="0"
              max="130"
              class="form-control @error('paciente.apellido') is-invalid @enderror">
            @error('paciente.apellido')
              <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
          @if ($edad<3)
            <div class="col-md-12">
              <label for="inputDni" class="form-label">Circunferencia Craneal</label>
              <input type="number" 
                id="inputDni" 
                name="paciente[dni]"
                value="{{old('paciente.dni')}}"
                min="30"
                max="60"
                class="form-control @error('paciente.dni') is-invalid @enderror">
              @error('paciente.dni')
                <div class="invalid feedback">{{$message}}</div>
              @enderror
            </div>
          @endif
          <div class="col-md-12">
            <label for="anomaly_opts" class="form-label">Anomalías</label>
            <select id="anomaly_opts" name="paciente[genero]" class="form-select @error('consulta.motivo') is-invalid @enderror">
              <option id="opt_default" value="">Elegir...</option>
              <option id="opt_yes" value="Si">Si</option>
              <option id="opt_no" value="No">No</option>
            </select>
            @error('consulta.motivo')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div id="anomalias" class="col-md-12 collapse">
            <label for="inputAnomaly" class="form-label">Indicar anomalías</label>
            <textarea type="text" 
              id="inputAnomaly" 
              name="paciente[dni]"
              disabled
              class="form-control @error('paciente.dni') is-invalid @enderror"
              rows="4">{{old('paciente.dni')}}</textarea>
            @error('paciente.dni')
              <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="col-md-12">
            <label for="inputDni" class="form-label">Observaciones</label>
            <textarea type="text" 
              id="inputDni" 
              name="paciente[dni]"
              class="form-control @error('paciente.dni') is-invalid @enderror"
              rows="3">{{old('paciente.dni')}}</textarea>
            @error('paciente.dni')
              <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
          
          {{-- <div class="col-md-12">
            <label for="inputNacimiento" class="form-label">Fecha de consulta</label>
            <input type="date" 
              id="inputNacimiento" 
              name="paciente[fecha_nac]"
              value="{{old('paciente.fecha_nac')}}"
              class="form-control @error('paciente.fecha_nac') is-invalid @enderror">
            @error('paciente.fecha_nac')
              <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div> --}}

          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
        </div>
      </article>
    </form>
@endsection