@extends('layouts.plantilla')

@section('title', 'Degrees')


@section('content')

    <h1>Lista de grados</h1>


<div class="container" >

    
    <div class="row  grid gap-5 " style="background-color: rgba(0, 0, 255, 0);  align-items: center;  justify-content: center; "  > 
        {{-- style="background-color: rgba(0, 0, 255, 0);  align-items: center;  justify-content: center" --}}
    
    


        
        @foreach ($degrees as $degree)

        <a  href="{{ route('degrees.show', $degree->id) }}  "style="height: 30rem; width:25rem;" > <ul class=" col-12   col-md-6  col-lg-4     bg-body-tertiary card   px-0  list-unstyled" style="height: 30rem; width:25rem;  align-items: center;   "   >
            <img class="card-img-top" style="background-color: rgb(67, 67, 67)"  src="https://hips.hearstapps.com/hmg-prod/images/2023-mclaren-artura-101-1655218102.jpg?crop=0.8889431489846579xw:1xh;center,top&resize=1200:*" alt="Card image cap">
            <div > <button class="btn btn-outline-info mt-3"> Informacion</button> </div>
         <li class="mt-2" >
                 {{ $degree->nombre }} 

            </li>
            <li class="mt-2"> {{ $degree->jornada }} </li>
            <li class="mt-2"> {{ $degree->numeroAlumnos}} </li>
        </ul>
    </a>
        @endforeach
    
    





    {{ $degrees->links() }}


    <a  class=" btn btn-primary" href="{{ route('degrees.create') }}"   >Crear grado</a>
    <div> 

        

</div>


@endsection
