@extends('layouts.plantilla')

@section('title', 'Registros create')


@section('content')

    <h1>inicio registro</h1>
    <a href=" {{ route('users.create') }}">Crear usuario</a>

    <ul>



        @foreach ($users as $user)
            <li>
                <a href="{{ route('users.show', $user->id) }}"> {{ $user->name }} </a>
                <img src="{{ asset($user->image->image_url) }}" alt="{{ $user['name'] }}">
            </li>
        @endforeach

    </ul>




@endsection
