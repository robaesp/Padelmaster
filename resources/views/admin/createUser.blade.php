@extends('plantillas.layout')

@section('titulo')
Admin:Crear usuario

@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-8 md:items-center ">
    <div class="md:w-6/12 p-4">
        <img src="{{ asset('img/signUp.jpg') }}" alt="foto de registro">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
        <form action="{{route('admin.createUser')}}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre</label>
                <input id="name" name="name" type="text" 
                    class="border p-3 w-full rounded-lg  border-red-700 "
                     />


            </div>

            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Username</label>
                <input id="username" name="username" type="text" 
                    class="border p-3 w-full rounded-lg  border-red-700 "
                     />


            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Contraseña</label>
                <input id="password" name="password" type="password" 
                    class="border p-3 w-full rounded-lg  border-red-700 " />


            </div>

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    Email</label>
                <input id="email" name="email" type="text" 
                    class="border p-3 w-full rounded-lg  border-red-700 "
                     />

                     <div class="mb-5">
                        <label for="categorylvl" class="mb-2 block uppercase text-gray-500 font-bold">
                            Nivel de categoría</label>
                                  <select class="form-select appearance-none
                                    block
                                    w-full
                                    px-3
                                    py-1.5
                                    text-base
                                    font-normal
                                    text-gray-700
                                    bg-white bg-clip-padding bg-no-repeat
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    id="categorylvl"
                                    name="categorylvl"
                                    >
                                      <option value="1">Nivel de categoría 1</option>
                                      <option value="2">Nivel de categoría 2</option>
                                      <option value="3">Nivel de categoría 3</option>
                                      <option value="4">Nivel de categoría 4</option>
                                      <option value="5">Nivel de categoría 5</option>
                                  </select>
                    </div>

            </div>
            <div class="mb-5">
                <label for="categorylvl" class="mb-2 block uppercase text-gray-500 font-bold">
                    Tipo</label>
                          <select class="form-select appearance-none
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding bg-no-repeat
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="type"
                            name="type"
                            >
                              <option value="normal">normal</option>
                              <option value="admin">admin</option>
                              <option value="club">club</option>
                          </select>
            </div>

            <div class="mb-5">
                <label for="categorylvl" class="mb-2 block uppercase text-gray-500 font-bold">
                    Lado</label>
                          <select class="form-select appearance-none
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding bg-no-repeat
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="side"
                            name="side"
                            >
                              <option value="izquierda">izquierda</option>
                              <option value="derecha">derecha</option>
                          </select>
            </div>


            <input type="submit" value="Crear cuenta" class="bg-sky-600 hover:bg-green-400 transition-colors cursor-pointer
                uppercase font-bold w-full p-3 text-white rounded-lg" />
        </form>
    </div>
</div>
@endsection