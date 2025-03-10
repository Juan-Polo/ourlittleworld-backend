@extends('layouts.plantilla')

@section('title', 'Mensaje' . $mensaje->nombre)


@section('content')

    <h1>Mensaje</h1>
    <a href="{{ route('mensajes.index') }}">Volver a la lista</a><br>
    <a href="{{ route('mensajes.edit', $mensaje) }}">Editar mensaje</a><br>


    <br>

    <p><strong>Mensaje </strong></p>
    <p> <strong>Remitente:</strong>{{ $mensaje->remitente }}</p>
    <p> <strong>Contenido:</strong>{{ $mensaje->contenido }}</p>
    <p> <strong>fecha y Hora:</strong>{{ $mensaje->fechaHora }}</p>
    <p> <strong>Chat </strong> {{ $mensaje->chat_id }} </p>


    <form action="{{ route('mensajes.destroy', $mensaje) }}" method="POST">
        @method('delete')
        @csrf


        <button type="submit" class="btn btn-danger">Eliminar</button>


    </form>


@endsection
