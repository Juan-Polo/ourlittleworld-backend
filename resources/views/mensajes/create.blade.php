@extends('layouts.plantilla')

@section('title', 'Mensajes create')


@section('content')

    <h1>Mensajes</h1>



    <form action="{{ route('mensajes.store') }}" method="POST">

        @csrf
        <label>Remitente: <br> <input type="text" name="remitente"> </label>
        <br>
        <label>Contenido: <br> <input type="text" name="contenido"> </label>
        <br>
        <label>Fecha y Hora <br> <input type="date" name="fechaHora"> </label>


        <br>
        <label>chat</label> <br>



        <select name="chat_id">
            @foreach ($chat as $chat)
                <option value=" {{ $chat['id'] }} "> {{ $chat['name'] }}   </option>
            @endforeach

        </select>



        <br><br>

        <button type="submit" class="btn btn-primary"> Registrate </button>


    </form>

@endsection
