@extends('layouts.plantilla')

@section('title', 'Chats lista')


@section('content')

    <h1>Lista chats</h1>
    <a href="{{ route('chats.create') }}">Crear chat</a>

    <ul>



        @foreach ($chats as $chat)
            <li>
                <a href="{{ route('chats.show', $chat->id) }}"> {{ $chat->name }} </a>

            </li>
        @endforeach

    </ul>


    {{ $chats->links() }}

@endsection
