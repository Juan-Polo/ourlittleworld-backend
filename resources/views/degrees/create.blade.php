@extends('layouts.plantilla')

@section('title', 'Degrees')


@section('content')

    <h1>Crea un Grado</h1>



    <form action="{{ route('degrees.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <label>Nombre: <br> <input type="text" name="name"> </label>
        <br>
        <label>Jornada: <br> <input type="text" name="school_day"> </label>
        <br>
        <label>Numero de alumnos: <br> <input type="number" name="students"> </label>
        <label>Adjuntar archivo PDF</label>
        <br><br>


        @foreach ($images as $images)
            <label>
                <input type="radio" name="image" value="{{ $images }}">
                <img src="{{ $images }}" alt="Imagen" style="width: 200px">
            </label>
        @endforeach


        <br><br>

        <button type="submit" class="btn btn-primary"> Crear </button>


    </form>

@endsection
