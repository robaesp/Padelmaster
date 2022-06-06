@extends('plantillas.layout')

@section('titulo')
Admin-Editar Perfil: {{ $users->username}}

@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg:white shadow p-6">
            <form method="POST" action="{{route('admin.editUser', $users->id )}}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @method('PUT')
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            placeholder="¿Nuevo nombre?"
                            class="border p-3 w-full rounded-lg"
                            />
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username</label>
                        <input
                            id="username"
                            name="username"
                            type="text"
                            placeholder="¿Nuevo username?"
                            class="border p-3 w-full rounded-lg @error('username') border-red-700 @enderror"
                            
                            />
                            @error('username')
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
                            placeholder="¿Nuevo email?"
                            class="border p-3 w-full rounded-lg @error('email') border-red-700 @enderror"
                            
                            />
                            @error('email')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            placeholder="¿Nuevo password?"
                            class="border p-3 w-full rounded-lg @error('password') border-red-700 @enderror"
                            
                            />
                            @error('password')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                </div>

                <div class="mb-5">
                <label for="side" class="mb-2 block uppercase text-gray-500 font-bold">
                    Lado</label>
                    <select
                        id="side"
                        name="side"
                        class="border p-3 w-full rounded-lg"
                        >
                        <option value="derecha">Derecha</option>
                        <option value="izquierda">Izquierda</option>
                    </select>
                </div>

                <div class="mb-5">
                    <label for="categorylvl" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nivel de categoría</label>
                        <select
                            id="categorylvl"
                            name="categorylvl"
                            class="border p-3 w-full rounded-lg">
                            <option value="1">Categoría 1</option>
                            <option value="2">Categoría 2</option>
                            <option value="3">Categoría 3</option>
                            <option value="4">Categoría 4</option>
                            <option value="5">Categoría 5</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="type" class="mb-2 block uppercase text-gray-500 font-bold">
                            Tipo de usuario</label>
                            <select
                                id="type"
                                name="type"
                                class="border p-3 w-full rounded-lg">
                                <option value="normal">Normal</option>
                                <option value="admin">Admin</option>
                                <option value="club">Club</option>
                            </select>
                        </div>
                <input 
                    type="submit"
                    value="Editar perfil"
                    class="bg-sky-600 hover:bg-green-400 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection