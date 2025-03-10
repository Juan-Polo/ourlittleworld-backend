@extends('layouts.plantilla')

@section('title', 'Mensaje')


@section('content')

    <h1>Edita este Mensaje</h1>



    <form action="{{ route('mensajes.update', $mensaje) }}" method="POST">

        @csrf
        @method('put')
        <label>Remitente: <br> <input type="text" name="remitente" value="{{ $mensaje->remitente }}"> </label>
        <br>
        <label>Contenido: <br> <input type="text" name="contenido" value="{{ $mensaje->contenido }}"> </label>
        <br>
        <label>fecha: <br> <input type="date" name="fechaHora"value="{{ $mensaje->fechaHora }}">
        </label>
        <br>
        <label>Chat: <br> <input type="text" name="chat_id"value="{{ $mensaje->chat_id }}">
        </label>

        <br><br>

        <button type="submit" class="btn btn-primary"> Actualizar </button>


    </form>

@endsection
