@extends('plantillas.layout')

@section('titulo')
Perfil: {{ $user->username }}
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
        <div class="w-6/12 lg:w-4/12 px-4 ">
            <img src="{{ $user->imagen ? asset('profiles').'/'.$user->imagen : asset('img/profileUser.svg')}}" alt="foto de perfil">
        </div>
        <div class="md:w-6/12 lg:w-4/12 px-4 flex flex-col items-center md:justify-center md:items-start md:py-5">
            <div class="flex items-center gap-3">
            <p class="text-black text-3xl">{{ $user->username}}</p>
            @auth
                @if($user->id === auth()->user()->id)
                    <a href="{{ route('profileEdit.index', $user) }}" class="text-black hover:text-green-500 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                          </svg>
                    </a>
                    @if($user->type == 'admin')
                    <a href="{{ route('admin') }}" class="flex items-center gap-2 bg-white border p-2 text-white rounded text-sm 
                    uppercase font-bold cursor-pointer"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                        <p class="text-black">Zona administración</p>
                    </a>
                    @endif
                @endif
            @endauth
            </div>
            <p class="text-black text-sm mb-3 font-bold mt-6">
                Nombre:<span class="font-normal"> {{ $user->name}}</span>
            </p>
            <p class="text-black text-sm mb-3 font-bold">
                Nivel:<span class="font-normal"> Categoría {{ $user->categorylvl}} </span>
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
        <p class="text-gray-600 uppercase tex-sm text-center font-bold">Anímate y sube algún partido</p>
    @endif
</section>
@endsection