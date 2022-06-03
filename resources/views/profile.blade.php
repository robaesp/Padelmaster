@extends('plantillas.layout')

@section('titulo')
Perfil: {{ $user->username }}
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
        <div class="w-6/12 lg:w-4/12 px-4 ">
            <img src="{{ asset('img/profileUser.svg')}}" alt="foto de perfil">
        </div>
        <div class="md:w-6/12 lg:w-4/12 px-4 flex flex-col items-center md:justify-center md:items-start md:py-5">
            <p class="text-black text-3xl">{{ $user->username}}</p>
            <p class="text-black text-sm mb-3 font-bold mt-6">
                Seguidores:<span class="font-normal"> 0</span>
            </p>
            <p class="text-black text-sm mb-3 font-bold">
                Seguidos:<span class="font-normal"> 0</span>
            </p>
            <p class="text-black text-sm mb-3 font-bold">
                Categoría: <span class="font-normal"> {{ $user->categorylvl}}</span>
            </p>
            <p class="text-black text-sm mb-3 font-bold">
                Lado:<span class="font-normal"> {{ $user->side}}</span>
            </p>
            <p class="text-black text-sm mb-3 font-bold">
               Fecha de registro: <span class="font-normal"> {{ $user->created_at->format('m/d/Y')}} </span>
            </p>
            </div>
        </div>
    </div>
</div>
<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Mis partidos</h2>

    @if($court->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach($court as $c)
    <div>
        <a href="{{ route('post.show', $c) }}">
            <img src="{{ asset('uploads')."/". $c->img}}" alt="Imagen del partido {{ $c->name}}">
        </a>
    </div>
    @endforeach
    </div>
    <div class="my-5">
        {{ $court->links()}}
    </div>
    
    @else
        <p class="text-gray-600 uppercase tex-sm text-center font-bold">Anímate y sube tu primer partido</p>
    @endif
</section>
@endsection