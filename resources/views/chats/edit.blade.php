@extends('layouts.plantilla')

@section('title', 'Chats')


@section('content')

    <h1>Edita este Chat</h1>



    <form action="{{ route('chats.update', $chat) }}" method="POST">

        @csrf
        @method('put')
        <label>name: <br> <input type="text" name="name" value="{{ $chat->name }}"> </label>
        <br>
        <label> participantes: <br> <input type="text" name="participantes" value="{{ $chat->participantes }}"> </label>
        <br>

        <label>Degree: <br> <input type="text" name="degree_id"value="{{ $chat->degree_id }}">
        </label>

        <br><br>

        <button type="submit" class="btn btn-primary"> Actualizar </button>


    </form>

@endsection
