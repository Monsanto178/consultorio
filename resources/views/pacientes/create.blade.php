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

    <a href="{{route('pacientes.index')}}">Volver</a>
    <form class="custom_width w-100 mx-auto row g-5 border p-3" action="{{ route('pacientes.store')}}" method="POST">
      @csrf
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
              value="{{old('paciente.nombre')}}"
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
              value="{{old('paciente.apellido')}}"
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
              value="{{old('paciente.dni')}}"
              class="form-control @error('paciente.dni') is-invalid @enderror">
            @error('paciente.dni')
              <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="inputGender" class="form-label">Género</label>
            <select id="inputGender" name="paciente[genero]" class="form-select @error('paciente.genero') is-invalid @enderror">
              <option value="">Elegir...</option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
              <option value="Otro">Otro</option>
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
              value="{{old('paciente.fecha_nac')}}"
              class="form-control @error('paciente.fecha_nac') is-invalid @enderror">
            @error('paciente.fecha_nac')
              <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
        </div>
      </article>


      {{-- Datos del Tutor --}}
      <article class="col-12">
        <div class="row gy-2">
          <div class="col-12">
            <h2>Datos del Tutor</h2>
          </div>
          <div class="col-12">
            <label for="inputName" class="form-label">Nombre</label>
            <input type="text" 
              id="inputName" 
              name="tutor[nombre]"
              value="{{old('tutor.nombre')}}"
              class="form-control @error('tutor.nombre') is-invalid @enderror">
            @error('tutor.nombre')
              <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="col-md-12">
              <label for="inputSurname" class="form-label">Apellido</label>
              <input type="text" 
                id="inputSurname" 
                name="tutor[apellido]"
                value="{{old('tutor.apellido')}}"
                class="form-control @error('tutor.apellido') is-invalid @enderror">
              @error('tutor.apellido')
                <div class="invalid feedback">{{$message}}</div>
              @enderror
            </div>
          <div class="col-md-12">
            <label for="inputDni" class="form-label">DNI</label>
            <input type="text" 
              id="inputDni" 
              name="tutor[dni]"
              value="{{old('tutor.dni')}}"
              class="form-control @error('tutor.dni') is-invalid @enderror">
            @error('tutor.dni')
              <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="col-md-12">
            <label for="inputRelation" class="form-label">Relación</label>
            <select id="inputRelation" name="tutor[relacion]" class="form-select @error('tutor.paciente') is-invalid @enderror">
              <option value="">Elegir...</option>
              <option value="Padre">Padre</option>
              <option value="Madre">Madre</option>
              <option value="Familiar">Familiar</option>
              <option value="Otro">Otro</option>
            </select>
            @error('tutor.relacion')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="inputEmail" class="form-label">Correo</label>
            <input type="email" 
              id="inputEmail" 
              name="tutor[correo]"
              value="{{old('tutor.correo')}}"
              class="form-control @error('tutor.correo') is-invalid @enderror">
            @error('tutor.correo')
              <div class="invalid feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="col-md-6">
              <label for="inputTel" class="form-label">Teléfono</label>
              <input type="tel" 
                id="inputTel" 
                name="tutor[telefono]"
                value="{{old('tutor.telefono')}}"
                class="form-control @error('tutor.telefono') is-invalid @enderror">
              @error('tutor.telefono')
                <div class="invalid feedback">{{$message}}</div>
              @enderror
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
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