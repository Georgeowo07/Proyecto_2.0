@extends('welcome')

@section('titulo', 'Ver Maestros')

@section('contenido')

@section('css')
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

    <h1 class="my-3">INDEX de Maestros</h1>
    <br>
    <a href="maestros/create" class="btn btn-primary">Crear</a>
    <div class="table-responsive my-3">
        <table id="maestros" class="table mt-3">
            <thead class="table-dark">
                <tr>
                    <th class="text-light" scope="col">ID</th>
                    <th class="text-light" scope="col">CODIGO</th>
                    <th class="text-light" scope="col">NOMBRE</th>
                    <th class="text-light" scope="col">APELLIDO PATERNO</th>
                    <th class="text-light" scope="col">APELLIDO MATERNO</th>
                    <th class="text-light" scope="col">NSS</th>
                    <th class="text-light" scope="col">CORREO</th>
                    <th class="text-light" scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maestros as $maestro)
                    <tr>
                        <td>{{$maestro->id}}</td>
                        <td>{{$maestro->codigo}}</td>
                        <td>{{$maestro->nombre}}</td>
                        <td>{{$maestro->apellidoPaterno}}</td>
                        <td>{{$maestro->apellidoMaterno}}</td>
                        <td>{{$maestro->nss}}</td>
                        <td>{{$maestro->correo}}</td>
                        <td>
                            <a href="/maestros/{{$maestro->id}}/edit" class="btn btn-warning">Editar</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$maestro->id}}">Eliminar</button>
                        </td>
                    </tr>
                    @include('estudiante.modal')
                @endforeach
            </tbody>
        </table>
    </div>
@endsection