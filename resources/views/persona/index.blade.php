
@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">
                &times;
            </span>
        </button>   
    </div>
@endif     

    

    <a href="{{ url('persona/create') }}"  class ="btn btn-success"> Registrar nueva Persona</a>
    <br>
    <br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Cedula</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombres</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Direccion</th>
                <td>Acciones</td>
            </tr>
        </thead>
        
        <tbody>
            @foreach( $personas as $persona)
            <tr>
                <td> {{ $persona->Cedula }} </td>
                <td>{{ $persona->ApellidoPaterno }}</td>
                <td>{{ $persona->ApellidoMaterno }}</td>
                <td>{{ $persona->Nombres }}</td>
                <td>{{ $persona->Telefono }}</td>
                <td>{{ $persona->Correo }}</td>
                <td>{{ $persona->Direccion }}</td>
                <td>
                    
                    <a href="{{ url('/persona/'.$persona->id.'/edit') }}"  class="btn btn-warning">
                        Editar
                    </a>

                    |
                    
                    <form action="{{ url('persona/'.$persona->id ) }}"  class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Eliminar los datos?')"
                        value="Borrar">
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection