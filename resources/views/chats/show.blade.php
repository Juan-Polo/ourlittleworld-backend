@extends('layouts.plantilla')

@section('title', 'Chat' . $chat->nombre)


@section('content')

    <h1>chat</h1>
    <a href="{{ route('chats.index') }}">Volver a la lista</a><br>
    <a href="{{ route('chats.edit', $chat) }}">Editar chat</a><br>


    <br>

    <p><strong>Chat </strong></p>
    <p> <strong>Nombre:</strong>{{ $chat->name }}</p>
    <p> <strong>Participantes:</strong>{{ $chat->participantes }}</p>
    <p> <strong>Degree </strong> {{ $chat->degree_id }} </p>


    <form action="{{ route('chats.destroy', $chat) }}" method="POST">
        @method('delete')
        @csrf


        <button type="submit" class="btn btn-danger">Eliminar</button>


    </form>


@endsection
