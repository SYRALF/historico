<h1> 
{{ $textBoton }} persona
</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        
        <ul>
            @foreach($errors->all() as $error)
            <li>
                {{ $error}}
            </li>
            @endforeach
        </ul>

    </div>

@endif

<div class="form-group">

    <label for="Cedula"> Cedula </label>
    <input type="text" class="form-control" name="Cedula"  value="{{ isset($persona->Cedula)?$persona->Cedula:old('Cedula') }}"  id="Cedula">

</div>

<div class="form-group">

    <label for="ApellidoPaterno"> Apellido Paterno </label>
    <input type="text" class="form-control" name="ApellidoPaterno"  value="{{ isset($persona->ApellidoPaterno)?$persona->ApellidoPaterno:old('ApellidoPaterno') }}"  id="ApellidoPaterno">

</div>

<div class="form-group">

    <label for="ApellidoMaterno"> Apellido Materno </label>
    <input type="text" class="form-control"  name="ApellidoMaterno"  value="{{ isset($persona->ApellidoMaterno)?$persona->ApellidoMaterno:old('ApellidoMaterno') }}"   id="ApellidoMaterno">

</div>

<div class="form-group">

    <label for="Nombres"> Nombres </label>
    <input type="text" class="form-control"  name="Nombres"  value="{{ isset($persona->Nombres)?$persona->Nombres:old('Nombres') }}"   id="Nombres">

</div>

<div class="form-group">

    <label for="Telefono"> Telefono </label>    
    <input type="text" class="form-control"  name="Telefono"  value="{{ isset($persona->Telefono)?$persona->Telefono:old('Telefono') }}"   id="Telefono">

</div>

<div class="form-group">

    <label for="Correo"> Correo </label>
    <input type="text" class="form-control"  name="Correo"  value="{{ isset($persona->Correo)?$persona->Correo:old('Correo') }}"   id="Correo">

</div>

<div class="form-group">

    <label for="Direccion"> Direccion </label>
    <input type="text" class="form-control"  name="Direccion"  value="{{ isset($persona->Direccion)?$persona->Direccion:old('Direccion') }}"   id="Direccion">

</div>

<input class="btn btn-success" type="submit" value=" {{ $textBoton }} Datos">

<a class="btn btn-primary" href="{{ url('persona/') }}"> Regresar </a>
<br>