@extends('layouts.plantilla')

@section('title', 'User' . $user->nombre)


@section('content')

    <h1>Pagina de usuario</h1>
    <a href="{{ route('users.index') }}">Volver a la lista</a><br>

    <a href="{{ route('users.edit', $user) }}">Editar usuario</a>

    <br>

    <p><strong>Este es el usuario </strong></p>
    <p> <strong>Nombre:</strong>{{ $user->nombre }}</p>
    <p> <strong>Apellido: </strong> {{ $user->apellidos }} </p>
    <p> <strong>Gmail: </strong> {{ $user->gmail }} </p>
    <p> <strong>Contraseña: </strong> {{ $user->password }} </p>
    <p> <strong>Role: </strong> {{ $user->role_id }} </p>



    <form action="{{ route('users.destroy', $user) }}" method="POST">

        @csrf
        @method('delete')



        <button type="submit" class="btn btn-danger">Eliminar</button>


    </form>

@endsection
