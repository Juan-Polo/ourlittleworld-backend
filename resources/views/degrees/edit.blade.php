@extends('layouts.plantilla')

@section('title', 'Degrees')


@section('content')

    <h1>Edita este Grado</h1>



    <form action="{{ route('degrees.update', $degree) }}" method="POST">

        @csrf
        @method('put')
        <label>Nombre: <br> <input type="text" name="nombre" value="{{ $degree->nombre }}"> </label>
        <br>
        <label>Jornada: <br> <input type="text" name="jornada" value="{{ $degree->jornada }}"> </label>
        <br>
        <label>Numero de alumnos: <br> <input type="number" name="numeroAlumnos"value="{{ $degree->numeroAlumnos }}">
        </label>

        <br><br>

        <button type="submit" class="btn btn-primary"> Actualizar </button>


    </form>

@endsection
