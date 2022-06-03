@extends('plantillas.layout')

@section('titulo')
Lugar: {{ $court->name }}
@endsection

@section('contenido')
    <div class="container mx-auto flex">
            <div class="md:w-2/6">
                <img src="{{ asset('uploads').'/'. $court->img }}" alt="Foto del partido {{ $court->name }}">
    </div>
    <div class="md:w-1/2 ml-6">
        <div class="bg-green-400 w-2/6 p-4 rounded-md border-2  flex items-center text-white">
            <p class='font-bold'>Organizador: {{$court->user->username}}</p>
        </div>

        <div class="bg-green-400 w-2/6 p-4 rounded-md border-2  flex items-center text-white">
            <p class='font-bold'>Tamaño: {{$court->size}}</p>
        </div>
        
        <div class="bg-green-400 w-2/6 p-4 rounded-md border-2  flex items-center text-white">
            <p class='font-bold'>Participantes: {{-- {{$court->}} --}}</p>
        </div>

        <div class="bg-green-400 w-2/6 p-4 rounded-md border-2  flex items-center text-white">
            <p class='font-bold'>Fecha y hora: {{$court->date_booking}} {{$court->hour_booking}}</p>
        </div>

        <div class="bg-green-400 w-2/6 p-4 rounded-md border-2  flex items-center text-white">
            <p class='font-bold'>Nivel de categoria: {{$court->category_lvl_court}}</p>
        </div>

        <div class="bg-green-400 w-2/6 p-4 rounded-md border-2  flex items-center text-white">
            <p class='font-bold'>Ciudad: {{$court->city}}</p>
        </div>
         <p class='font-bold'> {{$court->description}}</p>
        @if(auth()->user()->id == $court->user_id)
        <form action="{{ route('post.destroy', $court)}}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" value="Eliminar partido" class="bg-red-400 hover:bg-red-700 p-2 rounded text-white font-bold mt-4 cursor-pointer">
        </form>
          @else
        <form>
            <input type="submit" value="Inscribirme" class="bg-blue-400 hover:bg-green-500 p-2 rounded text-white font-bold mt-4 cursor-pointer">
        </form>
          @endif
        
    </div>
    
@endsection