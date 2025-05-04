{{-- @extends('layouts.layout') --}}
@extends('layouts.app')

@section('content')
    <div class="alert alert-warning" role="alert">
        A simple warning alert-chet it out!
    </div>

    <style>
      @media(min-width: 750px) {
        .custom_width {
          width: 50% !important;
          margin-left: auto;
          margin-right: auto;
        }
      }
    </style>

    <a href="{{route('pacientes.index')}}" class="text-dark">Volver</a>
    <form class="custom_width w-100 mx-auto row g-5 border p-3" action="{{ route('pacientes.store')}}">
      @csrf
      @method('PUT')
      {{-- Datos del Paciente --}}
      <article class="col-12">
        <div class="row gy-2">
          <div class="col-12">
            <h2>Datos del Paciente</h2>
          </div>
          <div class="col-12">
            <label for="inputName" class="form-label">Nombre</label>
            <input type="text" 
              id="inputName" 
              name="paciente[nombre]"
              value="{{old('paciente.nombre', $paciente->nombre)}}"
              class="form-control @error('paciente.nombre') is-invalid @enderror">
            @error('paciente.nombre')
                <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="col-md-12">
            <label for="inputSurname" class="form-label">Apellido</label>
            <input type="text"  
              id="inputSurname" 
              name="paciente[apellido]"
              value="{{old('paciente.apellido', $paciente->apellido)}}"
              class="form-control @error('paciente.apellido') is-invalid @enderror">
            @error('paciente.apellido')
              <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="inputDni" class="form-label">DNI</label>
            <input type="text" 
              id="inputDni" 
              name="paciente[dni]"
              value="{{old('paciente.dni', $paciente->dni)}}"
              class="form-control @error('paciente.dni') is-invalid @enderror">
            @error('paciente.dni')
              <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="inputGender" class="form-label">Género</label>
            <select id="inputGender" name="paciente[genero]" class="form-select @error('paciente.genero') is-invalid @enderror">
              <option value="">Elegir...</option>
              <option value="Masculino" {{$paciente->genero === 'Masculino' ? 'selected' : ''}}>Masculino</option>
              <option value="Femenino" {{$paciente->genero === 'Femenino' ? 'selected' : ''}}>Femenino</option>
              <option value="Otro" {{$paciente->genero === 'Otro' ? 'selected' : ''}}>Otro</option>
            </select>
            @error('paciente.genero')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-12">
            <label for="inputNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" 
              id="inputNacimiento" 
              name="paciente[fecha_nac]"
              value="{{old('paciente.fecha_nac', isset($paciente->fecha_nac) ? $paciente->fecha_nac->format('Y-m-d') : '')}}"
              class="form-control @error('paciente.fecha_nac') is-invalid @enderror">
            @error('paciente.fecha_nac')
              <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </article>
    </form>
@endsection


{{-- @section('title', 'Consultorio Médico')
    
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
@endsection --}}