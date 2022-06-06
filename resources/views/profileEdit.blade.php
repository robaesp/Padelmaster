@extends('plantillas.layout')

@section('titulo')
Editar Perfil: {{ auth()->user()->username}}

@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg:white shadow p-6">
            <form method="POST" action="{{route('profileStore.index', auth()->user()->id )}}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @method('PUT')
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username</label>
                        <input
                            id="imagen"
                            name="username"
                            type="text"
                            placeholder="¿Nuevo username?"
                            class="border p-3 w-full rounded-lg @error('username') border-red-700 @enderror"
                            value="{{auth()->user()->username }}"
                            />
                            @error('username')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                </div>

                <div class="mb-5">
                <label for="side" class="mb-2 block uppercase text-gray-500 font-bold">
                    Lado</label>
                    <select
                        id="side"
                        name="side"
                        
                        
                        class="border p-3 w-full rounded-lg @error('side') border-red-700 @enderror"
                        >
                        <option value="derecha">Derecha</option>
                        <option value="izquierda">Izquierda</option>
                        @error('side')
                        <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                        @enderror
                    </select>
                </div>

                <div class="mb-5">
                    <label for="categorylvl" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nivel de categoría</label>
                        <select
                            id="categorylvl"
                            name="categorylvl"
                            
                            
                            class="border p-3 w-full rounded-lg @error('categorylvl') border-red-700 @enderror"
                            >
                            <option value="1">Categoría 1</option>
                            <option value="2">Categoría 2</option>
                            <option value="3">Categoría 3</option>
                            <option value="4">Categoría 4</option>
                            <option value="5">Categoría 5</option>
                            
                            @error('categorylvl')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                        </select>
                    </div>


                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen de perfil</label>
                        <input
                            id="imagen"
                            name="imagen"
                            type="file"
                            class="border p-3 w-full rounded-lg "
                            value=""
                            accept=".jpg, .jpeg, .png"
                            />
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