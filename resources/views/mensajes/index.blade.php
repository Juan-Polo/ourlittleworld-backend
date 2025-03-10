@extends('layouts.plantilla')

@section('title', 'Mensajes lista')


@section('content')

    <h1>Lista mensajes</h1>
    <a href="{{ route('mensajes.create') }}">Crear Mensaje</a>

    <ul>



        @foreach ($mensajes as $mensaje)
            <li>
                <a href="{{ route('mensajes.show', $mensaje->id) }}"> {{ $mensaje->remitente }} </a>

            </li>
        @endforeach

    </ul>

    
    {{ $mensajes->links() }}

@endsection
