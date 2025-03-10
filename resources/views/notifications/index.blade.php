@extends('layouts.plantilla')

@section('title', 'Notifications lista')


@section('content')

    <h1>Lista Notifications</h1>
    <a href="{{ route('notifications.create') }}">Crear Notifications</a>

    <ul>



        @foreach ($notifications as $notification)
            <li>
                <a href="{{ route('notifications.show', $notification->id) }}"> {{ $notification->mensaje }} </a>

            </li>
        @endforeach

    </ul>


    {{ $notifications->links() }}

@endsection
