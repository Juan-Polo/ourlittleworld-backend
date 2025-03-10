@extends('layouts.plantilla')

@section('title', 'chats create')


@section('content')

    <h1>Chats</h1>



    <form action="{{ route('chats.store') }}" method="POST">

        @csrf
        <label>name: <br> <input type="text" name="name"> </label>
        <br>
        <label>participantes: <br> <input type="text" name="participantes"> </label>



        <br>
        <label>degree</label> <br>



        <select name="degree_id">
            @foreach ($degree as $degree)
                <option value=" {{ $degree['id'] }} "> {{ $degree['nombre'] }} </option>
            @endforeach

        </select>



        <br><br>

        <button type="submit" class="btn btn-primary"> Crear </button>


    </form>

@endsection
