@extends('layouts.plantilla')

@section('title', 'Notifications create')


@section('content')

    <h1>Notifications</h1>



    <form action="{{ route('notifications.store') }}" method="POST">

        @csrf
        <label>mensaje: <br> <input type="text" name="mensaje"> </label>
        <br>
        <label>Fecha y Hora <br> <input type="date" name="fechaHora"> </label>



        <br><br>

        <button type="submit" class="btn btn-primary"> Enviar </button>


    </form>

@endsection
