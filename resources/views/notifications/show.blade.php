@extends('layouts.plantilla')

@section('title', 'Notifications' . $notification->mensaje)


@section('content')

    <h1>notifications</h1>
    <a href="{{ route('notifications.index') }}">Volver a la lista</a><br>
    <a href="{{ route('notifications.edit', $notification) }}">Editar notifications</a><br>


    <br>

    <p><strong>Notification </strong></p>

    <p> <strong>Mensaje:</strong>{{ $notification->mensaje }}</p>
    <p> <strong>fecha y Hora:</strong>{{ $notification->fechaHora }}</p>



    <form action="{{ route('notifications.destroy', $notification) }}" method="POST">
        @method('delete')
        @csrf


        <button type="submit" class="btn btn-danger">Eliminar</button>


    </form>


@endsection
