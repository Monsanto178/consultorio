{{-- @extends('layouts.layout') --}}
@extends('layouts.app')

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
            <h2>Nueva Consulta</h2>
          </div>
          {{-- <div class="col-md-12">
            <label for="inputMotivo" class="form-label">Motivo</label>
            <select id="inputMotivo" name="paciente[genero]" class="form-select @error('consulta.motivo') is-invalid @enderror">
              <option value="">Elegir...</option>
              <option value="Chequeo">Control</option>
              <option value="Consulta">Síntomas</option>
            </select>
            @error('consulta.motivo')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div> --}}
          <div class="col-12">
            <label for="inputName" class="form-label">Síntomas</label>
            <input type="text" 
              id="inputName" 
              name="paciente[nombre]"
              value="{{old('paciente.nombre')}}"
              class="form-control @error('paciente.nombre') is-invalid @enderror">
            @error('paciente.nombre')
                <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="col-md-12">
            <label for="inputDni" class="form-label">Descripción de los síntomas</label>
            <textarea type="text" 
              id="inputDni" 
              name="paciente[dni]"
              class="form-control @error('paciente.dni') is-invalid @enderror"
              rows="2">{{old('paciente.dni')}}</textarea>
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

          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
        </div>
      </article>
    </form>
@endsection