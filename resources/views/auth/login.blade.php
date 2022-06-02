@extends('plantillas.layout')

@section('titulo')
    Inicia sesión en PadelMania
@endsection()

@section('contenido')

    <div class="md:flex md:justify-center md:gap-8 md:items-center ">
        <div class="md:w-6/12 p-4">
            <img src="{{ asset('img/login.jpg') }}" alt="foto de inicio de sesión">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login')}}" novalidate>
                @csrf
                
                @if(session('message'))
                    <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ session('message') }}</p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email</label>
                        <input
                            id="email"
                            name="email"
                            type="text"
                            placeholder="¿Cuál es tu correo electrónico?"
                            class="border p-3 w-full rounded-lg @error('email') border-red-700 @enderror"
                            value="{{old ('email')}}"
                            />
                            @error('email')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            placeholder="¿Cuál es tu contraseña?"
                            class="border p-3 w-full rounded-lg @error('password') border-red-700 @enderror"
                            />
                            @error('password')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                </div>

                <div class="mb-5">
                    <input 
                        type="checkbox" 
                        name="openSession"
                        />¿Mantener la sesión abierta?
                </div>
                <input 
                    type="submit"
                    value="Iniciar sesión"
                    class="bg-sky-600 hover:bg-green-400 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
                <p class="text-black font-bold ">¿No tienes cuenta?<a class="text-blue-500 font-bold"href="{{ route('register') }}"> Regístrate</a></p>
            </form>
        </div>
        </div>
    </div>
    
@endsection