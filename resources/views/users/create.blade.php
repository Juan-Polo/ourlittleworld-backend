@extends('layouts.plantilla')

@section('title', 'Registros create')


@section('content')

    <h1>Registrate</h1>



    <form action="{{ route('users.store') }}" method="POST">

        @csrf
        <label>Nombre: <br> <input type="text" name="nombre"> </label>
        <br>
        <label>Apellidos: <br> <input type="text" name="apellidos"> </label>
        <br>
        <label>Correo electronico: <br> <input type="text" name="gmail"> </label>
        <br>
        <label>Contraseña <br> <input type="password" name="password"> </label>
        <br>
        <label>Role</label> <br>



        <select name="role_id">
            @foreach ($role as $role)
                <option value=" {{ $role['id'] }} "> {{ $role['name'] }} </option>
            @endforeach

        </select>



        <br><br>

        <button type="submit" class="btn btn-primary"> Registrate </button>


    </form>







    <div class="contenedor__todo">
        <div class="caja__trasera">
            <div class="caja__trasera-login">
                <h3>Ya tienes alguna cuenta</h3>
                <p>Inicia sesion para entrar a la pagina</p>
                <button id="btn__iniciar-sesion">Iniciar Sesion</button>
            </div>

            <div class="caja__trasera-register">
                <h3>Aun no tienes cuenta</h3>
                <p>Registrate para que puedas iniciar sesion</p>
                <button id="btn__registrarse">Registrarse</button>
            </div>
        </div>
        <!-- Formulario de Login y Registro -->
        <div class="contenedor__login-register">
            <!-- Login -->
            <form action="" class="formulario__login">
                <h2>Iniciar Sesión</h2>
                <input type="text" placeholder="Correo Electronico" />
                <input type="password" placeholder="Contraseña" />

                <button><a href="index.html">Entrar</a></button>
            </form>
            <!-- Registro -->
            <form action="{{ route('users.store') }}" method="POST" class="formulario__register">
                <h2>Registrarse</h2>
                <input type="text" name="nombre">
                <input type="text" name="apellidos">
                <input type="text" name="gmail">
                <input type="password" name="password">




                <select name="role_id">
                    @foreach ($role as $role)
                        <option value=" {{ $role['id'] }} "> {{ $role['name'] }} </option>
                    @endforeach

                </select>
                <button type="submit" class="btn btn-primary"> Registrate </button>

            </form>
        </div>
    </div>

@endsection
