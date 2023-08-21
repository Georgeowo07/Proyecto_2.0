@extends('welcome')

@section('titulo', 'Agregar Maestros')

@section('contenido')

<form action="/maestros" method="post">
    @csrf
    <div>
        <label for="" class="form-label">Codigo</label>
        <input type="text" name="codigo" id="codigo" class="form-control">
        
        {{-- Erorres --}}
        @error('codigo')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    
    <div>
        <label for="" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
        
        {{-- Erorres --}}
        @error('nombre')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>

    <div>
        <label for="" class="form-label">Apellido Paterno</label>
        <input type="text" name="apellidoPaterno" id="apellidoPaterno" class="form-control">
        
        {{-- Erorres --}}
        @error('apellidoPaterno')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>

    <div>
        <label for="" class="form-label">Apellido Materno</label>
        <input type="text" name="apellidoMaterno" id="apellidoMaterno" class="form-control">

        {{-- Erorres --}}
        @error('apellidoMaterno')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>

    <div>
        <label for="" class="form-label">NSS</label>
        <input type="text" name="nss" id="nss" class="form-control">
        
        {{-- Erorres --}}
        @error('nss')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>


    <div>
        <label for="" class="form-label">Correo</label>
        <input type="email" name="correo" id="correo" class="form-control">
        
        {{-- Erorres --}}
        @error('correo')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    
    <br>
    <a href="/maestros" class="btn btn-danger text-light">Cancelar</a>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>


@endsection