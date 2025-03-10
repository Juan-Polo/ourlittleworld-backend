@extends('layouts.plantilla')

@section('title', 'Notifications')


@section('content')

    <h1>Edita esta Notification</h1>



    <form action="{{ route('notifications.update', $notification) }}" method="POST">

        @csrf
        @method('put')

        <label>Mensaje: <br> <input type="text" name="mensaje" value="{{ $notification->mensaje }}"> </label>
        <br>
        <label>fecha: <br> <input type="date" name="fechaHora"value="{{ $notification->fechaHora }}">
        </label>


        <br><br>

        <button type="submit" class="btn btn-primary"> Actualizar </button>


    </form>

@endsection
