@extends('layouts.plantilla')

@section('title', 'Registros edit')


@section('content')

    <h1>Edita este usuario</h1>



    <form action="{{ route('users.update', $user) }}" method="POST">

        @csrf

        @method('put')


        <label>Nombre: <br> <input type="text" name="nombre" value="{{ $user->nombre }}"> </label>
        <br>
        <label>Apellidos: <br> <input type="text" name="apellidos" value="{{ $user->apellidos }}"> </label>
        <br>
        <label>Correo electronico: <br> <input type="text" name="gmail" value="{{ $user->gmail }}"> </label>
        <br>
        <label>Contraseña <br> <input type="password" name="password" value="{{ $user->password }}"> </label>
        <br>
        <label>Role</label> <br>



        <select name="role_id">
            @foreach ($role as $role)
                <option value=" {{ $role['id'] }} "> {{ $role['name'] }} </option>
            @endforeach

        </select>
        <br><br>

        <button type="submit" class="btn btn-primary"> Actualizar formulario </button>


    </form>

@endsection
