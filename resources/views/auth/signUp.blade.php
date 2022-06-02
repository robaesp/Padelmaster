@extends('plantillas.layout')

@section('titulo')
    Regístrate en PadelMania
@endsection()

@section('contenido')

    <div class="md:flex md:justify-center md:gap-8 md:items-center ">
        <div class="md:w-6/12 p-4">
            <img src="{{ asset('img/signUp.jpg') }}" alt="foto de registro">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            placeholder="¿Cómo te llamas?"
                            class="border p-3 w-full rounded-lg @error('name') border-red-700 @enderror"
                            value="{{old ('name')}}"
                            />
                            @error('name')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username</label>
                        <input
                            id="username"
                            name="username"
                            type="text"
                            placeholder="¿Cuál será tu nombre de usuario?"
                            class="border p-3 w-full rounded-lg @error('username') border-red-700 @enderror"
                            value="{{old ('username')}}"
                            />
                            @error('username')
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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir contraseña</label>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            placeholder="Repite la contraseña"
                            class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-700 @enderror"
                            />
                            @error('password_confirmation')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                </div>

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

                <input 
                    type="submit"
                    value="Crear cuenta"
                    class="bg-sky-600 hover:bg-green-400 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
        </div>
    </div>
    
@endsection